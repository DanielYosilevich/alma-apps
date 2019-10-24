<html>

<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Details</title>
</head>
<style>
    <?php include public_path('css/styles.css') ?>
</style>

<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous">
</script>

<body>
    <?php
    $currUser = json_decode($user);
    $hobbies = json_decode($currUser->hobbies)->hobbies;
    $friends = json_decode($currUser->friends);
    if ($friends) {
        $friends = $friends->friends;
    } else {
        $friends = array();
    }

    $userList = json_decode($users);
    foreach ($userList as $usr) {
        $usrHobbies = json_decode($usr->hobbies)->hobbies;
    }
    ?>
    <div class=" details-wrapper">
        <div class="logo">{{$currUser->name}}</div>
        <hr>
        <div class="title"> Account Info: </div>
        <br>
        <div> Email: <span>{{$currUser->email}} </span></div>
        <div> Birthday: <span>{{$currUser->birthday}} </span></div>
        <ul> Hobbies:
            @foreach($hobbies as $hobby)
            <li>{{$hobby}}</li>
            @endforeach
        </ul>
        <ul> Friends:
            @foreach($friends as $friend)
            <li>{{$friend->name}}</li>
            @endforeach
        </ul>
        <hr>
        <div><span class="title">Users List:</span>&nbsp;&nbsp;(Click on to toggle <span class="logo">'Friend'</span> status!) </div>
        <div>Notice: You cannot have more than 5 friends. In case of adding 6th friend, the first friend in your Friends list will be automatically removed!</div>
        <br>
        <ul class="user-list">
            @foreach($userList as $usr)
            <?php
            $tempUsr = (object) [
                'id' => $usr->id,
                'name' => $usr->name
            ];
            ?>
            @if(in_array($tempUsr,$friends)) <li><span class="logo" data-id="{{$usr->id}}" data-name="{{$usr->name}}" onclick="toggleFriend(event)">{{$usr->name}}</span></li>
            @else <li><span data-id="{{$usr->id}}" data-name="{{$usr->name}}" onclick="toggleFriend(event)">{{$usr->name}}</span></li>
            @endif
            @endforeach
        </ul>
        <hr>
        <div>
            <button onclick="toggleBirthdays(event)">Show Birthdays</button>
        </div>
        <div id="friendsBirthdaysID" class="hidden"></div>
        <hr>
        <div>
            <button onclick="togglePotentials(event)">Show Potential Friends</button>
        </div>
        <div id="friendsPotentialsID" class="hidden"></div>
        <hr>
        <div>
            <button onclick="toggleUpcoming(event)">Show Upcoming Birthdays</button>
        </div>
    </div>
    <div id="friendsUpcomingID" class="hidden"></div>
    <hr>
    @component('home')
    @slot('title')
    Logout
    @endslot
    @endcomponent
    </div>
</body>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    var friends = @json($friends);
    var currUser = @json($currUser);
    var inProcess = false;

    function toggleFriend(e) {
        if (inProcess) {
            alert('SQL is still processing... Please wait.');
            return;
        }
        inProcess = true;
        e.target.classList.toggle("logo");
        var id = e.target.getAttribute('data-id');
        var name = e.target.getAttribute('data-name');
        var newFriend = {
            id: id,
            name: name
        }

        var friendIndex = friends.findIndex(function(friend) {
            return friend.name === newFriend.name;
        });
        if (friendIndex === -1) {
            if (friends.length === 5) friends.shift();
            friends.push(newFriend)
        } else {
            friends.splice(friendIndex, 1);
        }

        $.ajax({
            url: '/friends',
            type: 'POST',
            dataType: 'JSON',
            data: {
                id: currUser.id,
                friends: friends
            },
            success: function(response) {
                console.log(response);
                window.location.reload();
            },
            error: function(response) {
                console.log('error')
            }
        });
    }

    function toggleBirthdays(e) {
        document.querySelector('#friendsBirthdaysID').classList.toggle("hidden");
        if (e.target.innerText === 'Show Birthdays') {
            e.target.innerText = 'Hide Birthdays';
            $.ajax({
                url: '/birthdays',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    interval: 14
                },
                success: function(response) {
                    console.log(response);
                    var users = response.data;
                    var st = `<hr> Next Two Weeks: <hr> <ul>`
                    if (users.length) {
                        users.map(function(user) {
                            var tmp = user.birthday.slice(2) + '/' + user.birthday.slice(0, 2);
                            st += `<li>${user.name} - ${tmp}</li>`
                        })
                        st += `</ul>`
                        $("#friendsBirthdaysID").append(st);
                    }
                },
                error: function(response) {
                    console.log('error')
                }
            });
        } else {
            $("#friendsBirthdaysID").empty();
            e.target.innerText = 'Show Birthdays';
        }
    }

    function togglePotentials(e) {
        document.querySelector('#friendsPotentialsID').classList.toggle("hidden");
        if (e.target.innerText === 'Show Potential Friends') {
            e.target.innerText = 'Hide Potential Friends';
            $.ajax({
                url: '/potentials',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    interval: 5,
                    base: currUser.birthday
                },
                success: function(response) {
                    console.log(response);
                    var users = response.data;
                    var st = `<hr> Potential Friends:<br> Showing current user for brevity, i.e to demonstrate query works for +/- 5 days birthday range <br> <hr> <ul>`
                    if (users.length) {
                        users.map(function(user) {
                            var tmp = user.birthday.slice(2) + '/' + user.birthday.slice(0, 2);
                            st += `<li>${user.name} - ${tmp}</li>`
                        })
                        st += `</ul>`
                        $("#friendsPotentialsID").append(st);
                    }
                },
                error: function(response) {
                    console.log('error')
                }
            });
        } else {
            $("#friendsPotentialsID").empty();
            e.target.innerText = 'Show Potential Friends';
        }
    }

    function toggleUpcoming(e) {
        document.querySelector('#friendsUpcomingID').classList.toggle("hidden");
        if (e.target.innerText === 'Show Upcoming Birthdays') {
            e.target.innerText = 'Hide Upcoming Birthdays';
            var today = new Date();
            var year = today.getFullYear();
            var d = today.getDate();
            var m = today.getMonth();
            const oneDay = 24 * 60 * 60 * 1000; 
            const crDate = new Date(year, m, d);
            const nyDate = new Date(year, 11, 31);
            const interval = Math.round(Math.abs((nyDate - crDate) / oneDay));
            $.ajax({
                url: '/birthdays',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    interval: interval
                },
                success: function(response) {
                    console.log(response);
                    var users = response.data;
                    var st = `<hr> Upcoming Birthdays:<hr> <ul>`
                    if (users.length) {
                        users.map(function(user) {
                            var tmp = user.birthday.slice(2) + '/' + user.birthday.slice(0, 2);
                            st += `<li>${user.name} - ${tmp}</li>`
                        })
                        st += `</ul>`
                        $("#friendsUpcomingID").append(st);
                    }
                },
                error: function(response) {
                    console.log('error')
                }
            });
        } else {
            $("#friendsUpcomingID").empty();
            e.target.innerText = 'Show Potential Friends';
        }
    }
</script>

</html>