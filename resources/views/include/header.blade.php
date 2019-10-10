   <nav class="navbar navbar-expand-sm" style="border-bottom: 1px solid #ebebeb;">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="#" style="float: left;"><img src="{{Lib::asset('public/images/logo.png')}}" style="width: 140px;" alt=""></a>
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item" style="margin-right: 25px;">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="modal" data-target="#add_new_task">Add New </a>
                </li>

                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{Lib::asset('/logout')}}" style="background: #FF5C5C; color: #ffffff; border-radius: 4px; padding: 6px 20px;">
					Logout
				</a>
                </li>
            </ul>
        </div>
    </nav>