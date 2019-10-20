<html>

<style>
    <?php include public_path('css/styles.css') ?>
</style>

<body>
    <div>
        <span>Simple Server simulation for Social Site</span>
        <br>
        Made with Laravel & Postgre(cloud) / MySQL(local server)
        <hr>
        Unfortunately certain features are not available on cloud since,
        as it turned out, there are significant differences between MySQL and Postgre 
        with handling Date/Time.
        <hr>
        <span>Author</span>
        <br>
        Daniel Yosilevich
        <br>
        Tel.: (972)546729752
        <br>
        Email: danielyosilevich@gmail.com
        <br>
        <a href="https://danielyosilevich.github.io/website/">Website</a>
        <br>
        <hr>
    </div>
    @component('home')
    @slot('title')
    Home
    @endslot
    @endcomponent
</body>

</html>