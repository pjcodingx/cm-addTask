
<style>
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Georgia', sans-serif;
    }

    body {
        height: 100vh;
        overflow-x: hidden;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
    }

    /* START: NAVBAR STYLES */
    .navbar {
        background-color: #7FBF7F;
        padding: 10px 0; /* remove side padding */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow below navbar */
    }

    .navbar-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        padding: 0 20px;
    }

    .navbar-logo {
        width: 70px;
        height: 70px;
        object-fit: contain;
    }

    .navbar-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
    }

    .nav-btn {
        background-color: rgba(38, 115, 53, 1); /* Dark green color */
        color: white;
        border: none;
        border-radius: 50px;
        padding: 15px 40px;
        font-size: 1.3rem;
        cursor: pointer;
        transition: background-color 0.3s;
        min-width: 180px;
        text-align: center;
        
    }
    .nav-btn a{
        text-decoration: none;
        color: white;
        background-color: rgba(38, 115, 53, 1);
    }

    .nav-btn:hover {
        background-color: rgba(20, 95, 53, 0.8);
    }
    /* END: NAVBAR STYLES */

    /* Content area styles */
    .content-area {
        flex: 1;
        width: 100%;
        background-color: #f5f5f5;
    }



    /* Responsive adjustments */
    @media (max-width: 768px) {
        /* Responsive navbar */
        .navbar-container {
            flex-direction: column;
            gap: 15px;
        }
        
        .navbar-buttons {
            flex-direction: column;
            width: 100%;
        }
        
        .nav-btn {
            width: 100%;
            padding: 10px 20px;
            font-size: 1.1rem;
        }
    }

    

</style>


<nav class="navbar">
    <div class="navbar-container">
        <!-- Left Logo -->
        <div class="navbar-logo-wrapper">
            <img src="{{ asset('assets/images/cmlogo.png') }}" alt="College of Maasin Logo" class="navbar-logo left-logo">
        </div>

        <!-- Buttons Center -->
        <div class="navbar-buttons">
            <button class="nav-btn"><a href="{{ route('logout') }}">Logout</a></button>
            <button class="nav-btn"><a href="{{ route('task.add') }}">Add Task</a></button>
            <button class="nav-btn">Contact</button>
        </div>

        <!-- Right Logo -->
        <div class="navbar-logo-wrapper">
            <img src="{{ asset('assets/images/Bsit_cm_logo-removebg-preview.png') }}" alt="Library Logo" class="navbar-logo right-logo">
        </div>
    </div>
</nav>
