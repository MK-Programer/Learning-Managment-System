<html>
    
    <head>
        <meta charset="utf-8">
        <title>team-section</title>
    <style>
@import 'https://fonts.googleapis.com/css?family=Montserrat:300, 400, 700&display=swap';
*{
    margin:0;
        padding:0;
        /*font-family:sans:serif;*/
        
        }        
        
        
.team-section
        {
        overflow:hidden;
        text-align:center;
        background:#34495e;
        padding:60px
            
        }
    
.team-section h1
        {
        text-transform:uppercase;
        margin-bottom:60px;
        color:white;
    font-size:40px;    
        }        
    
.border
        {
            display: block;
            margin: auto;
            width: 160px;
            height: 3px;
         background: #3498db;
            margin-bottom: 40px;
                
        }
    
        .ps
        {
            margin-bottom: 40px;
            
            
        }
        
        
        .ps a
        {
            display: inline-block;
            margin: 0 40px;
            width: 160px;
            height: 160px;
            overflow: hidden;
            border-radius: 50%;
            
        }
        
   .ps a img
        {
            width: 100%;
            filter: grayscale(100%);
            transition: 0.4s all;
        }
 .ps a:hover >img
        {
           filter:none;
            
            
        }
        
        .section{
            width: 600px;
            margin: auto;
            font-size: 20px;
            color: white;
            text-align: justify;
            height: 0px;
            overflow: hidden;
        }
        
        .section:target{
            height: auto;
            
        }
        
        .name{
            display: block;
            margin-bottom: 30px;
            text-transform: uppercase;
            font-size: 22px;
            
        }
        
        </style>
        
        
    </head>
    
    <body>
       <?php include "Menu Bar.html"?>
        
        <div class="team-section">
            <br> <br>
            <h1>Our Team</h1>
            <span class="border"></span>
        <div class="ps">
            <a href="#p1"><img src="img/seif.jpeg" alt="seif"></a>
            <a href="#p2"><img src="img/sherif.jpeg" alt="sherif"></a>
            <a href="#p3"><img src="img/mostafa.jpeg" alt="mostafa"></a> 
            <a href="#p4"><img src="img/raheem.jpeg" alt="raheem"></a>
            <a href="#p5"><img src="img/baheeg.jpeg" alt="baheeg"></a>
        
        </div>
         <div class = "section" id = "p1">
            <span class ="name"> Seif Nagi </span>
             <span class ="border"> </span>
             <p>
              is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
             </p>
             
            </div>    
            
            <div class = "section" id = "p2">
            <span class ="name"> Sherif El Motayam </span>
             <span class ="border"> </span>
             <p>
              is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
             </p>
             
            </div>    
            
            <div class = "section" id = "p3">
            <span class ="name"> Mostafa Khaled </span>
             <span class ="border"> </span>
             <p>
              is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
             </p>
             
            </div>    
            
            <div class = "section" id = "p4">
            <span class ="name"> Raheem Ismaeil </span>
             <span class ="border"> </span>
             <p>
              is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
             </p>
             
            </div>    
            
            <div class = "section" id = "p5">
            <span class ="name"> Youssef Kamal </span>
             <span class ="border"> </span>
             <p>
              is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
             </p>
             
            </div>    
            
            
        </div>
            
            
    </body>
    
</html>