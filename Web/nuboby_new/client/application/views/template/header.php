<?php $current = '<span class="sr-only">(current)</span>'; ?>

<!doctype html>
<html lang="en" id="coba">
  <head>
    <title>Nuboby</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">Nuboby</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php if($page == 'homepage'){ echo 'active';} ?>">
            <a class="nav-link <?php if($page == 'homepage'){ echo 'disabled';} ?>" href="<?php if ($page == 'Homepage'){echo '#';} else {echo base_url();} ?>">Home<?php if($page == 'Homepage'){ echo $current;} ?></a>
          </li>
          <li class="nav-item <?php if($page == 'kata'){ echo 'active';} ?>">
            <a class="nav-link <?php if($page == 'kata'){ echo 'disabled';} ?>" href="<?php if ($page == 'kata'){echo '#';} else {echo base_url('c_login');} ?>">Kata<?php if($page == 'kata'){ echo $current;} ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
