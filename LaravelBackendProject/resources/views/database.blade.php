<html>
<style>
     <?php include public_path('css/styles.css') ?>
</style>
<body>
    @component('home')
        @slot('title')
            Home
        @endslot
    @endcomponent
    <hr>
    <h3>Users:</h3>
    <?php $els = json_decode($users); ?>
    @foreach($els as $user)
        <?php $el = json_encode($user, JSON_FORCE_OBJECT); ?>
        <p>{{$el}}</p>
        <hr>
    @endforeach
    @component('home')
        @slot('title')
            Home
         @endslot
    @endcomponent
</body>

</html>