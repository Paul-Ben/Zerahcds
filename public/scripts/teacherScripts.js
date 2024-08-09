document.getElementById('topic-select').addEventListener('change', function() {
    var topicInput = document.getElementById('topic-input');
    var topicSelect = document.getElementById('topic-select');
    if (this.value === 'new-topic') {
        topicInput.style.display = 'block';
        topicInput.required = true;
        topicSelect.style.display = 'none';
    } else {
        topicSelect.style.display = 'block';
        topicInput.style.display = 'none';
        topicInput.hidden = true;
        topicSelect.hidden = false;
    }
    });

document.getElementById('type').addEventListener('change', function () {
    var selectedType = this.value;
    var videoDiv = document.getElementById('videodiv');
    var docDiv = document.getElementById('docdiv');
    var linkDiv = document.getElementById('link');

    // Hide both divs initially
    videoDiv.hidden = true;
    docDiv.hidden = true;
    linkDiv.hidden = true;

    // Show the appropriate div based on selection
    if (selectedType === 'video') {
        videoDiv.hidden = false;
    } else if (selectedType === 'document') {
        docDiv.hidden = false;
    }else if (selectedType === 'link') {
        linkDiv.hidden = false;
    }
});

