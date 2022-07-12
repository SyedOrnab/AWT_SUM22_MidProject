<div id="header">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="dashboard">E-Pharmacy</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('supmedicine.info')}}">Add Medicine</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('medicine.list')}}">Medicine List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}">Logout</a>
      </li>
    </ul>
  </div>
</nav>
    </div>