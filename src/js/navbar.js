window.addEventListener('scroll', function() {
    var container = document.getElementById('navbar');
    var containerh = document.getElementById('navbarh');
    if (window.pageYOffset > 100) {
// apply fixed position when user has scrolled down 100 pixels
        container.style.position = 'fixed';
        container.style.margin = '0px';
        container.style.top = '0px';
        container.style.width = '100%';
        container.style.right = '0px';
        container.style.borderRadius = '0';
        
        
        containerh.style.position = 'fixed';
        containerh.style.top = '0';
        containerh.style.height = '70px';
        containerh.style.width = "calc(100% - 16px)";
        containerh.style.right = "-12px";
    } else {
// remove fixed position when user has scrolled back up
        container.style.position = 'absolute';
        container.style.marginTop = '0px';
        container.style.marginRight = '20px';
        container.style.right = '';		
        container.style.width = "100%";	
        container.style.borderRadius = '10px';
        
        containerh.style.position = 'absolute';
        containerh.style.marginTop = '0px';
        containerh.style.marginRight = '20px';
        containerh.style.height = '0';
        containerh.style.right = '';		
        containerh.style.width = "100%";	
    }
});