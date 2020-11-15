
/*function like(e) { 
  if(document.getElementById("likeButton"+e).getAttribute("class") != "likeButtonActive"){
      document.getElementById("likeButton"+e).setAttribute("class", "likeButtonActive");
      document.getElementById("likeButton"+e).innerHTML = 'Liked!';
  } else if (document.getElementById("likeButton"+e).getAttribute("class") == "likeButtonActive") {
      document.getElementById("likeButton"+e).setAttribute("class", "likeButton");
      document.getElementById("likeButton"+e).innerHTML = 'Like';
  }
}*/

function likeFunction(i) {

  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "k.php?id="+i, true); //post

  xhttp.onreadystatechange = function() {  
    if (this.readyState == 4 && this.status == 200) {
      
      console.log(this.responseText);
      
      var json = JSON.parse(this.responseText);

      if (json.response == 0) {
        document.getElementById('likeCount'+i).innerHTML = json.nrLikes;
        document.getElementById('whoLiked'+i).innerHTML = json.likedBy;
        document.getElementById('likeButton'+i).innerHTML ="Like";
        document.getElementById('likeButton'+i).setAttribute("class", "likeButton");
        console.log(json.response);
        console.log("Not liked :)");
      } else if (json.response == 1) {
        document.getElementById('likeCount'+i).innerHTML = json.nrLikes;
        document.getElementById('whoLiked'+i).innerHTML = json.likedBy;
        document.getElementById ('likeButton'+i).innerHTML = "Liked!";
        document.getElementById('likeButton'+i).setAttribute("class", "likeButtonActive");
        console.log(json.response);
        console.log("liked :)");
      } else {
        console.log("DIDNT WORK");
      }
    }
  }
  xhttp.send();
  
  /* document.getElementById("likeButton").addEventListener("click", function(){
        <script type="text/javascript" src="myscript.js"></script>
        var respond = new XMLHttpRequest();
        respond.open("GET", "testMain.php", true);
        respond.onload = function () {
            if(this.status == 200) {
                document.getElementById('mainAjax').innerHTML = this.responseText;
            }
        }
        respond.send();
    });*/


    //UPDATE DATA :D

  /*for ( x=0; x<2; x++){

    var respond = new XMLHttpRequest();
    
    respond.onload = function () {
      if(this.status == 200) {
        document.getElementById('mainAjax').innerHTML = this.responseText;
        console.log("RESPONSE IS: ",this.responseText);
      
        //setTimeout(2000);
      }
    }
    respond.open("GET", "testMain.php", true);
    respond.send();
  }*/
}



