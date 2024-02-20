<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Crop</title>
    <link rel="stylesheet" href="AddCrop.css">
<!-- <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=uHvtdU8HSw2humca99YoXG_89tA6fAU1zpzawPjrC09-W7LPFPmuvLesReVPQ5Myzknd-oD7u6YlPtAjA3hIfoEvJ2A4l2XR-HtdkJpTTFDOcodr1PzYsUdi9JkXMekYXg508INtU8m9BMi_663OgH83EPk17aAEBAWDbQZ0oetNKaW7W36wdCUBpHmKAS9igfoZvwCzfgGdxN7ynu0svL01MYknldclwBmkJj5G1fzaMzZEGB0ghifdyU_bqwzYVqFuInKKNkTrx7jz9aaqK-0VX8zuD-Jwrtv6cb6lVckqwkYrPyCOBwhQ0g2q4YEM8dHHPul-d76zI-nhhQ3Q6EhUknzZ58rSFjPcfIOP2eQ3zPwva0sivl9qiYOI0-GWqicew1IJdFEiUlA1j1yeaa-1tueVhJPhITnMq8pQDZVBhzvXfUE5uliM-q6CYN8NQhXXFwSvybRFkI3zFi1lXGK4xQ6zZt9iQaz7doDhe2_saxGM4CbLTjmU2V9zzJuaIG1I98kZnkIYBaPdHZATI8ZiUebluasDRPMKHoFRyEeqjCWVfUSZzQlsKuZrHpj0V-iLByoBQGhryac4yAkdV21jf6ddvzo1S2DlQeGCMgG07mOawBM-_a_FGYE47lKH8hETfhuFFyfEcQXLaCMqrgCx9oDvI_VNIijvmXi9aK0BjiAjRaFAoY0-K0YpiMlVnomosnUDi4uH1vEh55jr-dNQ0aqlaeNlOGCKRbA0k3EBIeMLP4IFp1t0EtwbtwCs5lDHVfZCjNEQSXvpipOWU0x1bWZxbyZFyiySgprkom4KbVt2ygda56OkODUgcmjezxedib_4bIcyzIfJ4jjHfaTfAq5gSvSvVPmnjRf3mcw4J6ypVvLXluNeRBqiYVBvfaftI9ApEKxtJQ9SHbCfxLVP4K9zeYm6gmALsDGY5oW1N2bVnRpkKpwGS8HM31HnxElvwwezflwf7AtZFyHuMPrTJ32rSDzV22brhjQ5wdXAinILpcxWvs22L8ixN-9orEUZFRWiQt_qJdNpR0FqsB4Ikj1s45yhGFSPj0ge9R7m5-5-0x-n9lGeKyTVebISi61cSyG2J0zU19cNfeMbxo5mbymyqengU9tnEjqUO6IwZE0jPCVJllDJ3KuPZzH9SjQYacMHClNJVTLH6iuHESbwMvA2lIClFuK6Oxo6AEbdMK3o84FVnQtf3eyH4xsy6lTLxJkkwdB9jERTgnSBJ10tNeMb3nXe9yr1ViT26e9KBble6vxEDz605XPlqYs4oWN2GqvI6NPye_NCV8iospZVY5i6cCv2dqiHP3NzLEsU8tjBtf__1t3vh6Vx3npK7fNv-2XZ8kcQRdQyb7FH2Nq2jJX8A_NwXvQ9FIAChZKn2TO40IglwkuZDoqt-jgNpYUTr5teypXUB-FysRQKWNWf7SJ9WlbMmWE-MdgzIDxvUTQq9n-1CGugG1w3qt_MTooyFw0liNCP0PBs8h6ncVwekrJlw-vMsRFKokLDQ8GPIZfFpv9C_4VAUlL07VhC--i-fBdmyCCoWaWFMvymb8dNd3Bj8gPQuT1D1AScZDT_3AtGrHiYf16ONCIir0ZvDzJtOe1DHqmI924EnStVA9XWNepk30uiFNV-9DCVNTFmpYZ0BqdsJ9IyPxCdky_h6MoyobNUsZH-4uemrBYX8Q" nonce="5e975089804306039e444b8262dbb1a7" charset="UTF-8"></script></head> -->
<body>

    <nav>
        <a href="http://localhost:4000/connection_establish">Home</a>
        <a href="">About Us</a>
        <a href="#">Documentation</a>
        <a href="">Crop Info</a> 
        <a href="http://localhost:4000/AddCrop.php">Add Crops</a> 
        <a href="http://localhost:4000/mycrops_exists.php">My Crops</a> 
      
        <div class="set12">

            <box-icon name='user' type='solid' ></box-icon>
            
            <abbr title="Accounts">
            <a href="http://localhost:4000/test.php"> 
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAATCAYAAAByUDbMAAAA9ElEQVQ4T9WUwQ2CQBBFoQLtQDtQKxAq0A7UDrACtQK1A+zADqQDoQItQTvwvwTNZLMLHrgwyT+Q2X0zf3ZCHHUYcYesqF+woazvpKn0kg5S+c84fDYLXZybywBn0lOi0CQArlzYWAcfnsN0t5cS6RaApS4Ma/cGGMXWAVjus8l8XCvYbJ2bD0b1k7SQqtre1XRDZytPd9vQngEcSW9PR8B8VjMXttTBowTMBp3yCLxsMCwsq0Ghw4USaZ2kMzq3cbEwqg6aKiu3kXIJsN1Frv1WI9FHaH8s/6wPHLBCLLCN8tsZSebSFqwHMG/066/RZjWY/wCKCiVU7ELrQAAAAABJRU5ErkJggg=="/ width="150%">
                </a>

        </abbr>
        </div>
    </nav> 
    <div class="box">
        <div class="container">
            
                <br>
    
                
                   <label for="touch"><div class="saan">Bed -1 &nbsp;</div></label><br>
                         <input type="checkbox" id="touch"> 


                         <form action="http://localhost:4000/crop_add.php" method="post"class="slide">
                           <input type="radio"name="bed1" value="Potato">
                          <label for="Potato">Potato</label><br>
                          <input type="radio"  name="bed1" value="Tomato">
                           <label for="Tomato">Tomato</label><br>
                           <input type="radio" class="bg" name="bed1" value="Chilli">
                           <label for="Chilli">Chilli</label><br>
                           <input type="radio"name="bed1" value="Onion">
                          <label for="Onion">Onion</label><br>
                          <input type="radio"  name="bed1" value="Cauliflower">
                           <label for="Cauliflower">Cauliflower</label><br>
                           <input type="radio" class="bg" name="bed1" value="Beetroot">
                           <label for="Beetroot">Beetroot</label><br><br>
                           <button class="favorite styled" type="submit">Plant &nbsp;<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAATCAYAAAByUDbMAAABV0lEQVQ4T62UgW3CMBREywRlg9INsgFhgpYJGjZgA2AC2glKJ2iZgLBBOwFhA9iAe9H/yHVsKUhYOjmy/e/unw2DhzuOwR25hn3ISgk+CSOhMbgH9gqBeZojo3AhvArDnu4nKbJKxZ9GsNX8E7lhCze/gchO3x0y7LLxJ0AaFngtrk8G1ly8Q1abKsqNVdPmmxWxfhRo34WW+iaSf2QoHoQPYW5EFNEycWyE90DEnRLDC2fCzEot0OJU4EBlRLQMaePV0UzL7BUpsokd9uwQoSA1EPkWVsIyRcYGrsgqzC5FVmtxLDzjLn4aOHi0qlYt44hlcl0LXybeBhsOirkZRquWIXMi8iyFNoaYbKQ1bpRRC9ze3g6zR0uVEfBEiOGaZ0yGCsGfBW83ZS4ZQa7NmTnjtnDEZTQGnk3ydnNkPA/avGnEZBtV89Pp89fUEYqLCJSWbnYF8wXrrUtkeUHI/QAAAABJRU5ErkJggg=="/></button>
                         </form>
    
                <!-- <label for="touch1"><div class="saan1">Bed-2 &nbsp;</div></label><br>
                <input type="checkbox" id="touch1">  -->


                <!-- <form action="http://localhost:4000/crop_add.php" method="post"class="slide1">
                    <input type="radio"name="bed2" value="Potato">
                          <label for="Potato">Potato</label><br>
                          <input type="radio"  name="bed2" value="Tomato">
                           <label for="Tomato">Tomato</label><br>
                           <input type="radio" class="bg" name="bed2" value="Chilli">
                           <label for="Chilli">Chilli</label><br>
                           <input type="radio"name="bed2" value="Onion">
                          <label for="Onion">Onion</label><br>
                          <input type="radio"  name="bed2" value="Cauliflower">
                           <label for="Cauliflower">Cauliflower</label><br>
                           <input type="radio" class="bg" name="bed2" value="Beetroot">
                           <label for="Beetroot">Beetroot</label><br><br>
                   <button class="favorite styled" type="submit">Plant &nbsp;<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAATCAYAAAByUDbMAAABV0lEQVQ4T62UgW3CMBREywRlg9INsgFhgpYJGjZgA2AC2glKJ2iZgLBBOwFhA9iAe9H/yHVsKUhYOjmy/e/unw2DhzuOwR25hn3ISgk+CSOhMbgH9gqBeZojo3AhvArDnu4nKbJKxZ9GsNX8E7lhCze/gchO3x0y7LLxJ0AaFngtrk8G1ly8Q1abKsqNVdPmmxWxfhRo34WW+iaSf2QoHoQPYW5EFNEycWyE90DEnRLDC2fCzEot0OJU4EBlRLQMaePV0UzL7BUpsokd9uwQoSA1EPkWVsIyRcYGrsgqzC5FVmtxLDzjLn4aOHi0qlYt44hlcl0LXybeBhsOirkZRquWIXMi8iyFNoaYbKQ1bpRRC9ze3g6zR0uVEfBEiOGaZ0yGCsGfBW83ZS4ZQa7NmTnjtnDEZTQGnk3ydnNkPA/avGnEZBtV89Pp89fUEYqLCJSWbnYF8wXrrUtkeUHI/QAAAABJRU5ErkJggg=="/></button>
                </form> -->

        </div>
    </div>


    
</body>
</html>