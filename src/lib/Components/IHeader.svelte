
<script>
   import Button from './Ibutton.svelte'; 
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
      align-items: center;
    }
  
    a {
      color: black;
      text-decoration: none;
      font-family: "DM Sans", sans-serif;
    }
  </style>
  
  <header>
    
    <nav>
        <img src={"./assets/image 1.png"} alt="ISSY" />
      <a href="/">Accueil</a>
      <a href="/donnees">Données</a>
      <a href="/actualites">Actualités</a>
      <a href="/outils">Outils</a>
      <a href="/contact">Contact</a>  
      <div>
      <Button color="white">Connexion</Button>
      <Button color="green">Inscription</Button>
    </div>
    </nav>
   
  
  </header>
  