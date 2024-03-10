let selectedText = '';
let mediaUrls = {
  image: '',
  audio: '',
  video: '',
  gif: ''
};

chrome.runtime.onInstalled.addListener(function() {
  chrome.contextMenus.create({
    id: "customMenuItem",
    title: "Save To Test",
    contexts: ["all"]
  });
});

chrome.contextMenus.onClicked.addListener(function(info, tab) {
  if (info.menuItemId === "customMenuItem") {
    // Check if there's selected text or media URLs
    let contentToSave = selectedText || '';

    // Append media URLs to the content
    for (const [mediaType, mediaUrl] of Object.entries(mediaUrls)) {
      if (mediaUrl) {
        contentToSave += '\n' + mediaType + ' URL: ' + mediaUrl;
      }
    }

    if (contentToSave) {
      // Display the content in an alert
      alert("Note saved:\n" + contentToSave);
    } else {
      alert("No content selected or media URL available.");
    }

    // Clear the media URLs for the next content capture
    resetMediaUrls();
  }
});

// Listen for messages from content scripts to update selected text or media URLs
chrome.runtime.onMessage.addListener(function(request, sender, sendResponse) {
  if (request.action === 'updateSelectedText') {
    selectedText = request.selectedText;
  } else if (request.action === 'copyMedia') {
    // Update media URL based on media type
    mediaUrls[request.mediaType] = request.mediaUrl;
  }
});

// Function to reset media URLs to empty values
function resetMediaUrls() {
  for (const mediaType in mediaUrls) {
    mediaUrls[mediaType] = '';
  }
}