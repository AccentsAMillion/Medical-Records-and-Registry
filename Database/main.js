function changeBackground()
    {
        var imgPath = new String();
        imgPath = document.getElementById("wrapper2").style.backgroundImage;
        if(imgPath == "url(imgs/nebula-reds.jpg)" || imgPath == "")
        {
            document.getElementById("wrapper2").style.backgroundImage = "url(imgs/nebula-greens.jpg)";
        }
        else if(imgPath == "url(imgs/nebula-greens.jpg)" || imgPath == ""){
            
            document.getElementById("wrapper2").style.backgroundImage = "url(imgs/nebula-reds.jpg)";
        }   
        else 
        {
            document.getElementById("wrapper2").style.backgroundImage = "";
        }
    }          
function ScheduledEvent(userName, firstName, lastName, email, password) {
            this.userName = userName;
            this.firstName = firstName;
            this.lastName = lastName;
            this.email = email;
            this.password = password;
            }

function Validate() {
            with (document.regForm){
                evt = new ScheduledEvent(userName.value, firstName.value, lastName.value, email.value, pass1.value);
            }
            
            with (evt){
                
                if (userName.length < 5) {
                    alert("Your user name must be at least 5 characters.")
                    return false;
                }
                
                if (firstName.length < 1) {
                    alert("You must enter a First Name.")
                    return false;
                }
                
                if (lastName.length < 1) {
                    alert("You must enter a Last Name.")
                    return false
                }
                
                if (!IsEmail(email)) {
                    alert("The email must be in email@email.com format.")
                    return false
                }
                 if (!passwordHandle(password)) {
                        alert("Your password must be between 8-20 characters long and contain at least 1 number, 1 character and 1 letter.")
                        return false
                }
            }
            return true;
        }

function IsEmail(sEmail) {
            
            if ((sEmail.length < 6) || (sEmail.indexOf("@", 0) == -1)) 
                    return false;
            else
                    return true;
            
        }
        
function passwordHandle(hPassword) {
            
            var passw = /^(?=.*\d)(?=.*[a-zA-Z]){8,20}$/;
            return passw.test(hPassword)
}
            
function handleReset() {
            document.getElementById("userName").focus();
            
        }
        
function changeColor() {
            document.body.style.backgroundColor = GetRandomColor();
        }

            
function userInfo() {
            alert ("Your username must be at least 5 characters in length and no more than 10");
}

function firstInfo() {
            alert ("Your first name must be at least 1 character in length!");
}
            
function lastInfo() {
            alert ("Your last name must be at least 1 character in length!");
}

function emailInfo() {
            alert ("The email must be in email@email.com format.");
}

function contactInfo() {
            alert ("For more information please contact Chris Woodward @ 888-888-8888 or you can email me at email@email.com.")
}

$(document).ready(function(){
            $('.hover').on("mouseover", function(){
                       var rollId = this.attributes["data-hover"].value;
                       $('#' + rollId).css("display", "inline-block");
            })
            
            $('.hover').on("mouseout", function(){
                       var rollId = this.attributes["data-hover"].value;
                       $('#' + rollId).css("display", "none");
            })
})

function getDate() {

            function monthArray() {
                        for (i = 0; i<monthArray.arguments.length; i++)
                        this[i + 1] = monthArray.arguments[i];
                        }
                        
                        var months = new monthArray('January','February','March','April','May','June','July','August','September','October','November','December');
                        var date = new Date();
                        var day = date.getDate();
                        var month = date.getMonth() + 1;
                        var yy = date.getYear();
                        var year = (yy < 1000) ? yy + 1900 : yy;
                        
                        document.getElementById("getDate").innerHTML = (months[month] + " " + day + ", " + year);
}

function GetRandomColor() {
      var letters = '0123456789ABCDEF'.split('');
        var color = '#';
       for (var i = 0; i < 6; i++ ) {
           color += letters[Math.floor(Math.random() * 16)];
       }
       return color;
            }

