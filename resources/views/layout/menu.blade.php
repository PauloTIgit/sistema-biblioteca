<header>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .menu {
            background-color: #2c3e50;
            padding: 10px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: space-around;
        }
        .menu ul li {
            margin: 0;
        }
        .menu ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .menu ul li a:hover {
            background-color: #34495e;
        }
        .menu ul li a .icon {
            font-size: 20px;
        }
    </style>

    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/phosphor-icons"></script>

    <nav class="menu">
        <ul>
            <li>
                <a href="/">
                    <i class="ph ph-house icon"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="/loans">
                    <i class="ph ph-handshake icon"></i>
                    Locação
                </a>
            </li>
            <li>
                <a href="/books">
                    <i class="ph ph-books icon"></i>
                    Livros
                </a>
            </li>
            <li>
                <a href="/users">
                    <i class="ph ph-users icon"></i>
                    Cliente
                </a>
            </li>
        </ul>
    </nav>
</header>
