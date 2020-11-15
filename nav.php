<!DOCTYPE html>
<html lang="en">
<head>
    <style>

    .nav {margin : auto;
    padding : 0;
    background-color : #668cff;
  text-align: center;}

    .nav div {display: flex;
    background-color: #668cff;
    margin: auto;
    width: 35%;
    text-align: center;}

    .logout {float: right; color: blue;}

    .nav a {
      font-family: serif;
    text-align : center;
    padding: 1em;
    text-decoration: none;
    color: white;
            border    : 1px solid #809fff;}

    .nav a:hover {background-color: #809fff;
    text-decoration: underline;}

    .nav a:last-child {border-right: 1px solid #aaa;}

    </style>
</head>

    <nav class="nav">
      <div>
            <a href="main.php">Forside</a>
            <a href="brugere.php">Find bruger</a>
            <a href="mainposts.php">Se alle opslag</a>
            <a href="dinside.php">Din side</a>


          <div class=logout>
             <form action="logout.php">
                <input type="submit" value="logout">
            </form>
          </div>
      </div>
    </nav>
