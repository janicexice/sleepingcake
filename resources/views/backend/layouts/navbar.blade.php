<!-- Navigation Start-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Backend</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="{{ route('admin.website.edit') }}">Website</a>
                <a class="nav-item nav-link" href="{{ route('admin.home.edit') }}">Home</a>

                <a class="nav-item nav-link" href="{{ route('admin.hobbies.index') }}">Hobbies</a>
                <a class="nav-item nav-link" href="{{ route('admin.diet.index') }}">Diet</a>
                <a class="nav-item nav-link" href="{{ route('admin.test.index') }}">Test</a>

                <a class="nav-item nav-link" href="{{ route('admin.treatments.index') }}">Treatments</a>
                <a class="nav-item nav-link" href="{{ route('admin.drug_introduction.index') }}">Drugs Introduciton</a>

                <a class="nav-item nav-link" href="{{ route('admin.vitamins.index') }}">Vitamins</a>
                <a class="nav-item nav-link" href="{{ route('admin.nutritions.index') }}">Nutritions</a>
                <a class="nav-item nav-link" href="{{ route('admin.logout') }}">Logout</a>
            </div>
        </div>
    </div>
</nav>
<!-- Navigation End  -->