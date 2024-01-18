<!-- Router.svelte -->

<script>
  
  const imagePath = '/src/img/youtube-logo.png';
  const imagePath1 = '/src/img/instagram-logo.png';
  const imagePath2 = '/src/img/linkedin-logo.png';
  const imagePath3 = '/src/img/facebook-logo.png';

  
  </script>
  
  <style>
 
  footer { 
    background-color:#282828;
    margin: 0;
  }

    
    .Page { 
        gap: 70%;
        display: flex;
        margin: 47px;
        margin-bottom: 5%;
    }
  

    h1{
      font-family: 'Inter', sans-serif;
      font-weight: bold;
      font-size: 24px;
      color: white;
      margin: 0;
      display: inline-block;
    }
  
  
    li {
      font-family: 'Inter', sans-serif;
      font-weight: regular;
      font-size: 16px;
      color: white;
      margin: 0;
    }
    h2{ 
        font-family: 'Inter', sans-serif;
      font-weight: regular;
      font-size: 16px;
      color: white;
      margin: 0; 
    }
  </style>
   



<footer class="py-4">
  <div class="Page">
    <h1 class="issy">Issy-les-Moulineaux</h1>

    <h2  class="text">Fonctionnement</h2>
  
 
  
  </div>
  <div class="mb-12 px-60">
    <h2 >Accéder au centre d'aide</h2>
  </div>

  <div class="flex space-x-4 gap-14" > 

   <div class="mb-12 px-60"> 
    <h1> Mairie </h1>
    <ul >
        <li>À propos </li>
        <li>Nos services</li>
        <li>Espace presse </li>
        <li>Ecologie</li>
        <li>blog</li>
        <li>Avenir</li>
        <li>Offres d'emploie </li>
    </ul>

   </div> 

   <div > 
    <h1> Date </h1>
    <ul>
        <li>Acceuil </li>
        <li>API</li>
       
    </ul>
   </div>

   <div> 
    <h1> Déplacment  </h1>
    <ul>
        <li>Covoiturage  </li>
        <li>Velib </li>
       
    </ul>
   </div>

  </div> 


  <div  class="flex space-x-4 mb-12  px-28 gap-96"> 

    <div  class="flex space-x-4 gap-24"> 
        <div>
            <img src={imagePath} alt="youtube" />
        </div>
        <div>
            <img src={imagePath1} alt="instagram" />
        </div>
        <div>
            <img src={imagePath2} alt="linkdin" />
        </div>
        <div >
            <img src={imagePath3} alt="facebook" />
        </div>
    </div>
      
      
      
      
        <div  class="flex space-x-2">

          <h2  class="bg-black bg-opacity-50 rounded-md p-2 ">Francais(France)</h2> 
          <h2  class="bg-black bg-opacity-50 rounded-md p-2"> Paris </h2>
          
        </div>
    
  </div>
</footer>
