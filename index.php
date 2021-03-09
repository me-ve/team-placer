<html>
    <head>
        <title>Team Placer</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <p id="logo">
            TEAM PLACER
        </p>
        <table>
            <tr id="row0">
                <th>Team Blue</th>
                <th>Team Red</th>
            </tr>
            <form id="teams">
            <?php
                for($i=1; $i<=5; $i++)
                {
                    echo "<tr id='row$i'>";
                    $j = ($i-1)*2;
                    echo "<td id='summoner{$j}' class='cell'>";
                    echo "<input type='checkbox' id='summoner{$j}lock' class='lockCheckbox'>";
                    echo "<input id='summoner{$j}name' class='input'>";
                    echo "</td>";
                    $j++;
                    echo "<td id='summoner{$j}' class='cell'>";
                    echo "<input id='summoner{$j}name' class='input'>";
                    echo "<input type='checkbox' id='summoner{$j}lock' class='lockCheckbox'>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
            </form>
        </table>
        <button onclick="Shuffle()" id="shufflebutton" class="input">Shuffle</button>
        <button onclick="Clear()" id="clearbutton" class="input">Clear</button>
        <button onclick="Import()" id="importbutton" class="input">Import...</button>
        <button onclick="Export()" id="exportbutton" class="input">Export...</button>
        <script src="script.js"></script>
    </body>
</html>