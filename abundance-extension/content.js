// contentScript.js

// Create a <style> element
var styleElement = document.createElement('style');

// Set the CSS text
styleElement.textContent = `
  /* Injected CSS to style context menu item */
  #customMenuItem {
    background-image: url('icon16.png'); /* Adjust the URL and size as needed */
    background-repeat: no-repeat;
    background-position: left center;
    padding-left: 20px; /* Adjust padding as needed */
  }
`;

// Append the <style> element to the <head> of the document
document.head.appendChild(styleElement);

// Listen for selection change events
document.addEventListener('mouseup', function() {
    let selectedText = window.getSelection().toString();
  
    // Send a message to background script to update selected text
    chrome.runtime.sendMessage({
      action: 'updateSelectedText',
      selectedText: selectedText
    });
  });

// Listen for right-click events
document.addEventListener('contextmenu', function(event) {
  let mediaType = null;
  let mediaUrl = null;

  // Check if the right-click target is an image element
  if (event.target.nodeName.toLowerCase() === 'img') {
    // Extract the URL of the image
    mediaType = 'image';
    mediaUrl = event.target.src;
  }
  
  // Check if the right-click target is an audio element
  else if (event.target.nodeName.toLowerCase() === 'audio') {
    // Extract the URL of the audio
    mediaType = 'audio';
    mediaUrl = event.target.currentSrc;
  }

  // Check if the right-click target is a video element
  else if (event.target.nodeName.toLowerCase() === 'video') {
    // Extract the URL of the video
    mediaType = 'video';
    mediaUrl = event.target.currentSrc;
  }

  // Check if the right-click target is an animated GIF (identified by .gif extension)
  else if (event.target.nodeName.toLowerCase() === 'img' && event.target.src.toLowerCase().endsWith('.gif')) {
    // GIF is treated as video, extract its URL
    mediaType = 'gif';
    mediaUrl = event.target.src;
  }

  // If a media URL is detected, send it to the background script
  if (mediaUrl) {
    // Send a message to background script with the media URL and type
    chrome.runtime.sendMessage({
      action: 'copyMedia',
      mediaType: mediaType,
      mediaUrl: mediaUrl
    });
  }
});
