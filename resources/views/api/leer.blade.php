<style>
    html{
        margin: 1rem;
    }
    h1{
        margin-bottom: 2rem;
        color: #7f5af0;
    }
    ul{
        list-style: none;
        padding: 0 0 1rem 0;
        border-bottom: 1px solid #7f5af0;
    }
    li{
        display: inline-block;
    }
    li:first-child{
        width: 10rem;
    }
    li:first-child img{
        width: 8rem;
    }
    li:last-child{
        width: 80%;
    }
    h2{
        margin-top: 0;
        color: #7f5af0;
    }
    a,
    a:visited{
        color: black;
    }
    a:hover{
        color: #7f5af0;
    }
</style>

<h1>Listado de Motos</h1>

<?php foreach ($rowset as $row): ?>

<ul>
    <li><img src="<?php echo $row['imagen'] ?>" alt="<?php echo $row['titulo'] ?>"></li>
    <li>
        <h2><?php echo $row['titulo'] ?></h2>
        <p><?php echo $row['entradilla'] ?></p>
        <p>
            Por <strong><?php echo $row['autor'] ?></strong> el <strong><?php echo $row['fecha'] ?></strong>
        </p>
        <a href="<?php echo $row['enlace'] ?>" title="Más información" target="_blank">
            Más Información
        </a>
    </li>
</ul>

<?php endforeach; ?>
