<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Your uploaded images</title>
  <!-- No CSS as requested -->
</head>
<body>

  <!-- Header / top bar -->
  <header>
    <div style="display:block;">
      <!-- Left: Logo -->
      <span>Logo</span>

      <!-- Search box -->
      <!-- <label for="q" style="margin-left:20px;">🔍</label>
      <input id="q" name="q" placeholder="Search for" /> -->

      <!-- Upload button -->
      <a id="uploadBtn" href="{{ route('upload') }}">Upload</a>

      <a href="{{ route('home') }}">Go gome</a>



    

      <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit">Logout</button>
      </form>
      
    </div>
  </header>

  <!-- Main page title -->
  <main>
    <h1 style="text-align:center;">Your Uploads</h1>

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
    
    <table>
        <tbody>
                @foreach($images as $img)
                    <tr>
                        <td>Title: {{ $img->title}}</td>
                        <td>-</td>
                        <td>Tag: {{ $img->tag}}</td>
                        <td>-</td>
                        <td>Image: </td>
                        <td>
                            <a href="{{ route('image.show', $img->id) }}">
                                <img src="{{ $img->image }}" style="width:120px; height:auto; display:block; margin:auto;">
                            </a>
                        </td>
                        <td>-</td>
                        @can('update', $img)
                            <td><a href="{{ route('imageedit', $img->id) }}">edit</a></td>
                            <td>-</td>
                        @endcan
                        @can('delete', $img)
                            <td>
                                <a href="javascript:void(0);" onclick="removeImage({{ $img->id }})" style="cursor:pointer;">
                                    delete
                                </a>
                            </td>
                        @endcan
                        <form id="remove-form-{{ $img->id }}"
                            action="{{ route('upload.destroy', $img->id) }}"
                            method="POST" style="display:none;">
                            @csrf
                            @method('DELETE')
                        </form>

                        <td>
                            <a href="{{ route('upload.makepdf', $img->id) }}">
                                make pdf out of it
                            </a>
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
function removeImage(id) {
    document.getElementById('remove-form-' + id).submit();
}



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
