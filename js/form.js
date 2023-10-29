// regex for password in javascript

 // how to trim white space in jquery

// charAt method in javascript
// validate . postion in email in jquery in easyway
// validation for name dont use more than 1 whitespace between two words
function validateName(name) {
   const regex = /^[A-Za-z\s]+$/;
   return regex.test(name) && !name.includes(" ");
}
let aa =validateName("Er.  Rohan Maurya")
console.log(aa)

// let nameRegex = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;


// var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
// let regex = /^\d+$/;

// // Create a function to validate the form
// function validateForm() {
//     // Get all the input elements from the form
//     var inputs = document.querySelectorAll("input");
  
//     // Loop through all the inputs and check if they are valid
//     for (var i = 0; i < inputs.length; i++) {
//       // Check if the input is empty
//       if (inputs[i].value === "") {
//         alert("Please fill in all fields!");
//         return false;
//       }
  
//       // Check if the input is valid based on type attribute
//       if (inputs[i].type === "email" && !validateEmail(inputs[i].value)) {
//         alert("Please enter a valid email address!");
//         return false;
//       }
  
//       if (inputs[i].type === "number" && !validateNumber(inputs[i].value)) {
//         alert("Please enter a valid number!");
//         return false;
//       }
  
//     }
  
//     // If all inputs are valid, return true. Otherwise, return false.  
//     return true;  
//   }  
  
//    // Create a function to validate email addresses  
//   function validateEmail(email) {  
//     var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;  
  
//     return re.test(String(email).toLowerCase());  
//   }  
  
//    // Create a function to validate numbers  
//   function validateNumber(number) {  
  
//     var re = /^\d+$/;  
  
   // return re.test(String(number));  														     }
   // onkeypress add three number and show in div in easy way
   // concat two string
   // sweetalert on button click reload page in jquery
// dropdown in js
// how to validate image size in multiple input in jquery
