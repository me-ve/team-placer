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
                <th>Lock</th>
                <th>Team Blue</th>
                <th>Team Red</th>
                <th>Lock</th>
            </tr>
            <form id="teams">
            <?php
                for($i=1; $i<=5; $i++)
                {
                    echo "<tr id='row$i'>";
                    $j = ($i-1)*2;
                    echo "<td id='lock'$j}' class='cell'>";
                    echo "<input type='checkbox' id='summoner{$j}lock' class='lockCheckbox'>";
                    echo "</td>";
                    echo "<td id='summoner{$j}' class='textCell'>";
                    echo "<input id='summoner{$j}name' class='textInput'>";
                    echo "</td>";
                    $j++;
                    echo "<td id='summoner{$j}' class='textCell'>";
                    echo "<input id='summoner{$j}name' class='textInput'>";
                    echo "</td>";
                    echo "<td id='lock'$j}' class='cell'>";
                    echo "<input type='checkbox' id='summoner{$j}lock' class='lockCheckbox'>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
            </form>
        </table>
        <table>
        <td class="buttontd"><button onclick="Shuffle()" id="shufflebutton" class="input">Shuffle</button></td>
        <td class="buttontd"><button onclick="Clear()" id="clearbutton" class="input">Clear</button></td>
        <td class="buttontd"><button onclick="Import()" id="importbutton" class="input">Import...</button></td>
        <td class="buttontd"><button onclick="Export()" id="exportbutton" class="input">Export...</button></td>
        </table>
        <script src="script.js"></script>
    </body>
</html>