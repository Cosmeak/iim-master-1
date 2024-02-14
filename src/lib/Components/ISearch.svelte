<script>

  </script>
  
  <style>
    .search-bar {
      display: flex;
      align-items: center;
      border: 1px solid #ccc;
      border-radius: 20px;
      padding: 5px 10px;
    }
  
    input {
      flex: 1;
      border: none;
      outline: none;
    }
  
    button {
      border: none;
      background-color: transparent;
      cursor: pointer;
    }
  
    .filter-icon {
      margin-left: 10px;
      cursor: pointer;
    }
  </style>
  
  <div class="search-bar">
    <input type="text" placeholder="Rechercher..." />
    <button>Recherche</button>
    <svg class="filter-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
      <path d="M0 0h24v24H0z" fill="none"/>
      <path d="M4 18h16v-2H4v2zm0-5h16v-2H4v2zm0-7v2h16V6H4z"/>
    </svg>
  </div>