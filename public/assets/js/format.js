function updateFileUploadAccept() {
    var format = document.getElementById("format").value;
    var fileUpload = document.getElementById("fileUpload");
    var otherFormatInput = document.getElementById("otherFormatInput");
    var otherFormat = document.getElementById("otherFormat");

    switch (format) {
        case 'csv':
            fileUpload.accept = ".csv";
            otherFormatInput.style.display = "none";
            break;
        case 'xls':
            fileUpload.accept = ".xls";
            otherFormatInput.style.display = "none";
            break;
        case 'xlsx':
            fileUpload.accept = ".xlsx";
            otherFormatInput.style.display = "none";
            break;
        case 'txt':
            fileUpload.accept = ".txt";
            otherFormatInput.style.display = "none";
            break;
        case 'other':
            fileUpload.accept = "";
            otherFormatInput.style.display = "block";
            break;
        default:
            fileUpload.accept = "";
            otherFormatInput.style.display = "none";
    }
}

window.onload = function() {
    updateFileUploadAccept(); // Set initial accept value based on default selection
};
