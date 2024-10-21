//Custom function for datepicker
$(function () {
    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //Date picker
    $('#publish_date').datetimepicker({
       format: 'L'
    });
    
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
       theme: 'bootstrap4'
    })

    //Initialize Select2 Elements
    $('.select3').select2()

    //Initialize Select2 Elements
    $('.select3bs4').select2({
       theme: 'bootstrap4'
    })
 });
 // custom function for texarea editor
 $(function () {
    // Summernote
    $('#description').summernote()
 })
 // custom function for texarea editor
 $(function () {
    // Summernote
    $('#short_description').summernote()
 })
 $(function () {
   // Summernote
   $('#add_schema').summernote()
})
/*
// DropzoneJS Demo Code Start
Dropzone.autoDiscover = false

// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
var previewNode = document.querySelector("#template")
previewNode.id = ""
var previewTemplate = previewNode.parentNode.innerHTML
previewNode.parentNode.removeChild(previewNode)

var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
   url: "/target-url", // Set the url
   thumbnailWidth: 80,
   thumbnailHeight: 80,
   parallelUploads: 20,
   previewTemplate: previewTemplate,
   autoQueue: false, // Make sure the files aren't queued until manually added
   previewsContainer: "#previews", // Define the container to display the previews
   clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
})

myDropzone.on("addedfile", function(file) {
      $('#actions').append('<input type="hidden" name="documents[]" value="' + file.name + '" multiple>') 
   // Hookup the start button
   file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
})

// Update the total progress bar
myDropzone.on("totaluploadprogress", function(progress) {
document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
})

myDropzone.on("sending", function(file) {
// Show the total progress bar when upload starts
document.querySelector("#total-progress").style.opacity = "1"
// And disable the start button
file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
})

// Hide the total progress bar when nothing's uploading anymore
myDropzone.on("queuecomplete", function(progress) {
document.querySelector("#total-progress").style.opacity = "0"
})
// DropzoneJS Demo Code End

$(function () {
bsCustomFileInput.init();
}); */


$(function () {
 $("#example1").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
 }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
 $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
 });
});


// Show the first tab and hide the rest
$('#tabs-nav li:first-child').addClass('active');
$('.tab-content').hide();
$('.tab-content:first').show();

// Click function
$('#tabs-nav li').click(function(){
  $('#tabs-nav li').removeClass('active');
  $(this).addClass('active');
  $('.tab-content').hide();
  
  var activeTab = $(this).find('a').attr('href');
  $(activeTab).fadeIn();
  return false;
});
