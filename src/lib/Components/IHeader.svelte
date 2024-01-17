
<script>
   const imagePath = '/src/img/image 1.png';
  </script>
  
  <style>
   
    header {
      background-color:white;
      color: white;
      padding: 1em;
      text-align: center;
      font-family: "DM Sans", sans-serif;
    }
  
    nav {
      display: flex;
      justify-content: space-around;
      margin-top: 10px;
    }
  
    a {
      color: black;
      text-decoration: none;
      font-family: "DM Sans", sans-serif;
    }
  </style>
  
  <header>
    
    <nav>
        <img src={imagePath} alt="ISSY" />
      <a href="/">Accueil</a>
      <a href="/donnees">Données</a>
      <a href="/actualites">Actualités</a>
      <a href="/outils">Outils</a>
      <a href="/contact">Contact</a>
    </nav>
  
  </header>
  