document.onLoad(() => {
var script = document.createElement('script');
 
script.src = '//code.jquery.com/jquery-1.11.0.min.js';
document.getElementsByTagName('head')[0].appendChild(script); 

$.ajax({
  method: "POST",
  url: "/qualcosa",
  data: { name: "John", location: "Boston" }
})
  .done(function( msg ) {
    alert( "Data Saved: " + msg );
  });
}