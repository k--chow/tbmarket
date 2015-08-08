
function Textbook(title, author, ISBN, publisher, image, year) { //book model
  this.title = title;
  this.author = author;
  this.ISBN = ISBN;
  this.publisher = publisher;
  this.image = image;
  this.year = year;
  this.edition = null;
}
var books = new Array(10);
//var Books = new Array(10); set this on search

$(document).ready(function() {
 
 $('#searchForm').submit(function() {
  
  searchBooks();
  return false;
 });
  window.fbAsyncInit = function() {
        FB.init({
          appId      : '471108896405092',
          xfbml      : true,
          cookie     : true,
          version    : 'v2.4'
          
        });
        start();
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "https://connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));

      function statusChangeCallback(response)
    {
      if (response.status === 'connected') {
        getInfo();
        '<?php echo "hi";?>'
        
      }
      else if (response.status === 'not_authorized')
    {
      document.getElementById("status").innerHTML = '<button onclick="FB.login()">Authorize</button>';
      //make it so it refreshes and you are logged in
    }
      else
      {
      document.getElementById("status").innerHTML = '<button onclick="FB.login()">Log In</button>';
      
      }
    }

    

    function start() {
      FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
        
    })

      }

      
     

});<!--end of ready-->

function enter() {

$('#main').load('commons/main.php');
$('#sidebar').css('visibility', 'visible');
$('#results').innerHTML = "H";
$('#searchForm').css('visiblity', 'visible');
}

function search() {
   var query = document.getElementsByName('query')[0].value;
   var formData = {value: query};
   $.ajax({
    url: 'db.php', 
    type: 'post',
    data: formData,
    success: function() {
   $('#results').load('db.php');
  }
});
}


  
  function formChanged()
{
  query = document.getElementsByName('query')[0].value;
  
}

function clicker() {
var query = document.getElementsByName('query')[0].value;
$.ajax({
  url: 'db.php', 
  type: 'POST', 
  traditional: true,
  data: {A: query},
success: function(data) {
  //console.log(data);
$('#results').html(data);
//$('#results').load('db.php/');
}
});
        
          
      }

function searchBooks() {
  $('#results').html("<img src='http://jimpunk.net/Loading/wp-content/uploads/loading1.gif'></img>");
  var query = document.getElementsByName('query')[0].value;
  var urlEncoded = encodeURI(query);
  
  $.ajax({
    type: 'GET',
    dataType: "json",
    url: 'https://www.googleapis.com/books/v1/volumes?q='+ urlEncoded,
    success: function(data) {
      $('#results').html('');
      for(var i=0; i<books.length; i++)
      {
        books[i] = new Textbook(
          data.items[i].volumeInfo.title,
          data.items[i].volumeInfo.authors, 
          data.items[i].volumeInfo.industryIdentifiers[0].identifier,
          data.items[i].volumeInfo.publisher,
          data.items[i].volumeInfo.imageLinks.smallThumbnail,
          data.items[i].volumeInfo.publishedDate);
          //data[i].Edition);
         
        
        $('#results').append(     "<br><br>Title: " + books[i].title 
                                    + "<br>Author: " + books[i].author
                                    + "<br>ISBN: " + books[i].ISBN
                                    + "<br>Publisher: " + books[i].publisher
                                    + "<br><img src='" + books[i].image + "'/>"
                                    + "<br>Year: " + books[i].year
                                    + "<br>Edition: " + books[i].edition
                                    + "<br><button>Buy It</button><button onclick='sellBook(" + i + ")'>Sell It</button>");

       

      }
    }

  });
}

function getInfo(soldby, fblink) {
      
      FB.api(
        "/me", function(response) {
        //document.getElementById("status").innerHTML = "Welcome, " + response.name;
        soldby.value = response.name;
        fblink.value = response.id;
        });
      
    }


function sellBook(i) {
  $('#results').html('');
  $('#results').html('Listing for ' + books[i].title + ' by ' + books[i].author + '<br><br><form method="post"><input type="hidden" readonly="true" id="title"/><input type="hidden" readonly="true" id="authors"/><input type="hidden" readonly="true" id="ISBN"><input type="hidden" id="publisher" readonly="true"/><input type="hidden" id="image" readonly="true"/><input type="hidden" id="year"readonly="true"/><input type="hidden" id="edition" readonly="true"/><input type="hidden" readonly="true" id="soldby"><br><br>Price: $<input type="text" id="price"><input type="hidden" id="fblink"><br><br>Condition: <input type="text" id="condition"><br><br><input type="submit" value="Submit"><br><br></form>');
document.getElementById('title').value = books[i].title;
document.getElementById('authors').value = books[i].author;
document.getElementById('ISBN').value = books[i].ISBN;
document.getElementById('publisher').value = books[i].publisher;
document.getElementById('image').value = books[i].image;
document.getElementById('year').value = books[i].year;
document.getElementById('edition').value = books[i].edition;
var soldby = document.getElementById('soldby');
var fblink = document.getElementById('fblink')
getInfo(soldby, fblink);
  
}
