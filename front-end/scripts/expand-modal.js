// var scrollPosition = 0;

// function openCardModal() {
//     document.getElementById('modal-card').style.display = 'block';
//     scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
//     document.body.style.overflow = 'hidden';
//   }
  
//   function closeCardModal() {
//     document.getElementById('modal-card').style.display = 'none';
//     document.body.style.overflow = 'auto';
//     window.scrollTo(0, scrollPosition);
//   }



function openCardModal(dataType, dataContent) {
    // Populate the modal content based on data type
    var modalContent = '';
    switch (dataType) {
        case 'textnote':
            modalContent = "<p>" + dataContent + "</p>";
            break;
        case 'image':
            modalContent = "<img src='" + dataContent + "' alt='Image' class='modal-trigger modal-image'>";
            break;
        case 'video':
            modalContent = "<video controls class='modal-trigger modal-video'><source src='" + dataContent + "' type='video/mp4'></video>";
            break;
        case 'audio':
            modalContent = "<audio controls><source src='" + dataContent + "' type='audio/mp3'></audio>";
            break;
        case 'link':
            modalContent = "<a href='" + dataContent + "'>" + dataContent + "</a>";
            break;
        case 'file':
            modalContent = "<a href='" + dataContent + "' download>" + dataContent + "</a>";
            break;
        default:
            modalContent = "<p>" + dataContent + "</p>";
            break;
    }

    // Set the modal content
    document.querySelector('.modal-body.content').innerHTML = modalContent;

    // Show the modal
    document.getElementById('modal-card').style.display = 'block';
}

function closeCardModal() {
    // Hide the modal
    document.getElementById('modal-card').style.display = 'none';
}


