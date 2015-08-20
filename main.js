
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
                                    //+ "<br>Edition: " + books[i].edition
                                    + "<br><button type='button' onclick='buyBook(" + i + ")'class='btn btn-sm btn-info'>Buy It</button>" + " " + "<button class='btn btn-sm btn-info' onclick='sellBook(" + i + ")'>Sell It</button>");

       

      }
    }

  });
}
var title, author, ISBN, publisher, image, year, edition, soldby, price, condition, linkfb;
function getInfo() {
      
      FB.api(
        "/me", function(response) {
        
        soldby = response.name;
        linkfb = response.id;
        });
      
    }


function sellBook(i) {
  $('#results').html('');
  title = books[i].title;
  author = books[i].author;
  ISBN = books[i].ISBN;
  publisher = books[i].publisher;
  image = books[i].image;
  year = books[i].year;
  $('#results').html('Listing for ' + books[i].title + ' by ' + books[i].author + '<br><br><form method="post" action="db2.php" id="sellIt">Edition: <input type="text" id="edition" name="edition" required onkeypress="return event.charCode >= 48 && event.charCode <= 57"/><br><br>Price: $ <input type="text" id="price" name="price" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode === 46"><br><br>Condition: <select name ="condition" id ="condition" required><option value="poor">Poor</option><option value="average" required>Average</option><option value="Excellent">Excellent</option></select><br><br><input type="submit" value="Submit"><br><br></form>');
  getInfo();
  //console.log(title + " " + author + " " + ISBN + " " + publisher + " " + image + " " + year + " " + soldby + " " + linkfb + " " + price + " " + edition + " " +condition);
  $('#sellIt').submit(function() {

  post();
    return false;
    
  });
}

function countListings() {
  getInfo(); //for linkfb
  //use GET for it!
}

function buyBook(i) {
   title = books[i].title;
  author = books[i].author;
  ISBN = books[i].ISBN;
  publisher = books[i].publisher;
  image = books[i].image;
  year = books[i].year; 
   
   jQuery.ajax({
    type: 'POST',
    url: 'buybook.php/',
    data: {A: title, B: author},
    success: function(data) {
     
      $('#results').html(data);
    },
    error: function(xhr, ajaxOptions, thrownError) {
      //alert(xhr.status + " " + thrownError);
      
    },
    
    

  });
}

function post() {
  price = document.getElementsByName('price')[0].value;
  edition = document.getElementsByName('edition')[0].value;
  condition = document.getElementsByName('condition')[0].value;
  
  var formData = { A: title, B: author, C: ISBN, D: publisher, E: image, F: year, G: edition, H: soldby, I: price, J: condition, K: linkfb};
  //console.log(title + " " + author + " " + ISBN + " " + publisher + " " + image + " " + year + " " + soldby + " " + fblink + " " + price + " " + edition + " " +condition);
  var url = 'db2.php/'
  jQuery.ajax({
    type: 'POST',
    url: url,
    data: formData,
    success: function(data) {
     
      $('#results').html(data);
    },
    error: function(xhr, ajaxOptions, thrownError) {
      alert(xhr.status + " " + thrownError);
      
    },
    
    

  });
  
}


function sendMessage(linkfb) {
  FB.ui({
  method: 'send',
  link: 'https://apps.facebook.com/tbmarket/',
  to: linkfb,

});

}

function aboutPage() {
  $('#results').html("<h3>Buy and sell your needed and unneeded textbooks within your university.</h3><p>Simply list your book, and buyers will message you. Simply search for a book and message sellers.</p>");
}

function getListings() {
  getInfo();
      
  jQuery.ajax({
    type: 'POST',
    url: 'getlistings.php',
    data: {A: linkfb},
    success: function(data) {
      console.log(linkfb);
      $('#results').html(data);
    },
    error: function(xhr, ajaxOptions, thrownError) {
      //alert(xhr.status + " " + thrownError);
      
    },
    
    

  });
  
}