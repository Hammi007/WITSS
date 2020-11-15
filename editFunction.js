function editFunction(i) {

    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "editPost.php?id="+i, true); //post
  
    xhttp.onreadystatechange = function() {  
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('userPostContainer'+i).innerHTML = this.responseText;      
        //document.getElementById('postContainer').innerHTML = "asdasdasdasdasdasdasd :D";      
      
      }
    }
    xhttp.send();
    
  
    /*for ( x=0; x<2; x++){
  
      var respond = new XMLHttpRequest();
      
      respond.onload = function () {
        if(this.status == 200) {
          document.getElementById('mainAjax').innerHTML = this.responseText;
          console.log("RESPONSE IS: ",this.responseText);
        
          //setTimeout(2000);
        }
      }
      respond.open("GET", "main.php", true); 
      respond.send();
    }*/
}  