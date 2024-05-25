<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" c ontent="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>
  
  <nav class="menu-container">
    <ul>
      <li><a class="menu" href="#" onclick="tes()">Home</a></li>
      <li><a class="menu" href="#">Blog</a></li>
      <li><a class="menu" href="#" onclick="tes()">About Me</a></li>
      <li><a class="menu" href="#" onclick="switchTheme(this)">Dark Mode</a></li>
    </ul>
  </nav>

  <div class="article-container">
              <img src="https://picsum.photos/200" width="100">
              <div class="paragraph-container"> 
                <h3><a class="title" href="#judul">Penggunaan Join pada SQL Database</a></h3><br>
                <p>Asyik hari ini panas banget, pasti sesuatu deh entar</p><br>
                <small>28 Nov 23</small> | <small>9 min read</small>
              </div> 
            </div>
            <div class="article-container">
              <img src="https://picsum.photos/200" width="100">
              <div class="paragraph-container"> 
                <h3><a class="title" href="#judul">Penggunaan Join pada SQL Database</a></h3><br>
                <p>Asyik hari ini panas banget, pasti sesuatu deh entar</p><br>
                <small>28 Nov 23</small> | <small>9 min read</small>
              </div> 
            </div>
            <div class="article-container">
              <img src="https://picsum.photos/200" width="100">
              <div class="paragraph-container"> 
                <h3><a class="title" href="#judul">Penggunaan Join pada SQL Database</a></h3><br>
                <p>Asyik hari ini panas banget, pasti sesuatu deh entar</p><br>
                <small>28 Nov 23</small> | <small>9 min read</small>
              </div> 
            </div>
            <div class="article-container">
              <img src="https://picsum.photos/200" width="100">
              <div class="paragraph-container"> 
                <h3><a class="title" href="#judul">Penggunaan Join pada SQL Database</a></h3><br>
                <p>Asyik hari ini panas banget, pasti sesuatu deh entar</p><br>
                <small>28 Nov 23</small> | <small>9 min read</small>
              </div> 
            </div>
            <div class="article-container">
              <img src="https://picsum.photos/200" width="100">
              <div class="paragraph-container"> 
                <h3><a class="title" href="#judul">Penggunaan Join pada SQL Database</a></h3><br>
                <p>Asyik hari ini panas banget, pasti sesuatu deh entar</p><br>
                <small>28 Nov 23</small> | <small>9 min read</small>
              </div> 
            </div>
            <div class="article-container">
              <img src="https://picsum.photos/200" width="100">
              <div class="paragraph-container"> 
                <h3><a class="title" href="#judul">Penggunaan Join pada SQL Database</a></h3><br>
                <p>Asyik hari ini panas banget, pasti sesuatu deh entar</p><br>
                <small>28 Nov 23</small> | <small>9 min read</small>
              </div> 
            </div>
            <div class="article-container">
              <img src="https://picsum.photos/200" width="100">
              <div class="paragraph-container"> 
                <h3><a class="title" href="#judul">Penggunaan Join pada SQL Database</a></h3><br>
                <p>Asyik hari ini panas banget, pasti sesuatu deh entar</p><br>
                <small>28 Nov 23</small> | <small>9 min read</small>
              </div> 
            </div>
            <div class="article-container">
              <img src="https://picsum.photos/200" width="100">
              <div class="paragraph-container"> 
                <h3><a class="title" href="#judul">Penggunaan Join pada SQL Database</a></h3><br>
                <p>Asyik hari ini panas banget, pasti sesuatu deh entar</p><br>
                <small>28 Nov 23</small> | <small>9 min read</small>
              </div> 
            </div>
            <div class="article-container">
              <img src="https://picsum.photos/200" width="100">
              <div class="paragraph-container"> 
                <h3><a class="title" href="#judul">Penggunaan Join pada SQL Database</a></h3><br>
                <p>Asyik hari ini panas banget, pasti sesuatu deh entar</p><br>
                <small>28 Nov 23</small> | <small>9 min read</small>
              </div> 
            </div>
            <div class="article-container">
              <img src="https://picsum.photos/200" width="100">
              <div class="paragraph-container"> 
                <h3><a class="title" href="#judul">Penggunaan Join pada SQL Database</a></h3><br>
                <p>Asyik hari ini panas banget, pasti sesuatu deh entar</p><br>
                <small>28 Nov 23</small> | <small>9 min read</small>
              </div> 
            </div>
            <div class="article-container">
              <img src="https://picsum.photos/200" width="100">
              <div class="paragraph-container"> 
                <h3><a class="title" href="#judul">Penggunaan Join pada SQL Database</a></h3><br>
                <p>Asyik hari ini panas banget, pasti sesuatu deh entar</p><br>
                <small>28 Nov 23</small> | <small>9 min read</small>
              </div> 
            </div>
            <div class="article-container">
              <img src="https://picsum.photos/200" width="100">
              <div class="paragraph-container"> 
                <h3><a class="title" href="#judul">Penggunaan Join pada SQL Database</a></h3><br>
                <p>Asyik hari ini panas banget, pasti sesuatu deh entar</p><br>
                <small>28 Nov 23</small> | <small>9 min read</small>
              </div> 
            </div>

            <section id="section-ini">
              <p>MENGETES SAJA</p>
            </div>
<script>
  function tes()
  {
    var iniSection = document.getElementById("section-ini")

    iniSection.scrollIntoView({behavior: 'smooth'})
  }

  function switchTheme(event)
  {
    var currentTheme = event.innerHTML

    if(currentTheme == "Dark Mode")
    {
      event.innerHTML = "Light Mode"
    }
    else 
    {
      event.innerHTML = "Dark Mode"
    }
      // switch to dark mode
      document.body.classList.toggle("darker-background")
      document.getElementsByTagName("nav")[0].classList.toggle("dark-background")

      let element = document.getElementsByClassName("article-container")
      for(let i = 0; i < element.length; i++)
      {
        element[i].classList.toggle("dark-background")
      }
    }
  
</script>
</body>
</html>