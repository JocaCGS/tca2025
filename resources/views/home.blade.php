<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Your ideas start here</title>
  <!-- No CSS as requested -->
</head>
<body>

  <!-- Header / top bar -->
  <header>
    <div style="display:block;">
      <!-- Left: Logo -->
      <span>Logo</span>

      <!-- Search box -->
      <label for="q" style="margin-left:20px;">🔍</label>
      <input id="q" name="q" placeholder="Search for" />

      <!-- Title dropdown -->
      <select id="titleSelect" name="title" aria-label="Title">
        <option>Title</option>
        <option>Tag</option>
      </select>

      <!-- Upload button -->
      <a id="uploadBtn" href="{{ route('upload') }}">Upload</a>


      <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit">Logout</button>
      </form>
      
    </div>
  </header>

  <!-- Main page title -->
  <main>
    <h1 style="text-align:center;">Your ideas start here</h1>

    <!-- Big container that visually groups the image area (no CSS, so simple fieldset) -->
    <fieldset>
      <legend>Gallery</legend>

      <!-- Controls above gallery -->
      <div>
        <label for="cols">Columns:</label>
        <select id="cols">
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>

        <button id="refresh">Refresh</button>
      </div>

      <!-- The Pinterest-like grid implemented as a table -->
      <!-- Using a table so layout is predictable without CSS. Each cell contains a single image -->
      <table id="imagesTable" role="grid" cellspacing="8" cellpadding="8" border="1" style="width:100%;">
        <tbody>
            @foreach ($images as $image)
            <tr>
                <td>
                <div>
                    <img
                    src="{{ asset('storage/' . $image->image) }}"
                    width="300"
                    data-title="{{ $image->title }}"
                    data-tag="{{ $image->tag }}"
                    >
                    <div class="caption"></div>
                </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>


      <!-- Static fallback images for demo (will be overwritten when JS runs) -->
      <noscript>
        <p>JavaScript is disabled. Showing static images.</p>
        <table border="1" cellspacing="8" cellpadding="8">
          <tr>
            <td><img src="/mnt/data/5a3100f2-050d-490d-a321-e4f438bea428.png" alt="Demo image 1" width="200"></td>
            <td><img src="/mnt/data/5a3100f2-050d-490d-a321-e4f438bea428.png" alt="Demo image 2" width="200"></td>
            <td><img src="/mnt/data/5a3100f2-050d-490d-a321-e4f438bea428.png" alt="Demo image 3" width="200"></td>
          </tr>
        </table>
      </noscript>
    </fieldset>
  </main>

  <!-- Simple script to populate the table from an API or from demo data -->
  <script>
(function () {

  var table = document.getElementById('imagesTable').getElementsByTagName('tbody')[0];

  function buildGrid(cols) {
    cols = parseInt(cols) || 3;

    // pegar todas as imagens renderizadas pelo Blade
    var imgs = table.querySelectorAll("img");

    // limpar tabela
    table.innerHTML = "";

    var row;
    imgs.forEach(function(img, i) {

      if (i % cols === 0) {
        row = document.createElement('tr');
        table.appendChild(row);
      }

      var td = document.createElement('td');
      var wrapper = document.createElement('div');

      // mover a imagem original
      wrapper.appendChild(img);

      // criar caption baseado no banco
      var caption = document.createElement('div');
      caption.textContent = img.dataset.title + " - " + img.dataset.tag;

      wrapper.appendChild(caption);
      td.appendChild(wrapper);
      row.appendChild(td);

    });
  }

  // refresh
  document.getElementById('refresh').addEventListener('click', function() {
    buildGrid(document.getElementById('cols').value);
  });

  // mudança de colunas
  document.getElementById('cols').addEventListener('change', function() {
    buildGrid(this.value);
  });

  // iniciar
  buildGrid(document.getElementById('cols').value);

})();
</script>


</body>
</html>
