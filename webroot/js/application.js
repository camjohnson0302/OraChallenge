
// window.onload = function() {
//   var pictureInput = document.getElementById('picture');
//   var fileDisplayArea = document.getElementById('fileDisplayArea');
//   var picture = document.getElementById('picture2');

//   pictureInput.addEventListener('change', function(event) {


//     var file = pictureInput.files[0];
//     // console.log(file);



//     var imageType = /image.*/;

//     if (file.type.match(imageType)) {
//       var reader = new FileReader();

//       reader.onload = function(event) {
//         fileDisplayArea.innerHTML = "";

//         // var img = new Image();
//         // console.log(img);
//         // img.src = reader.result;
//         // fileDisplayArea.appendChild(img);
//       }

//       // reader.readAsDataURL(file); 
//       picture.value = file;
//     } 
//     else {
//       fileDisplayArea.innerHTML = "File not supported!";
//     }


//     });




// }