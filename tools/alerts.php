<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
        if (getCookie("SuccessAlert") != "") {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: getCookie("SuccessAlert") ,
                showConfirmButton: false,
                timer: 1500
                })
                removeCookie("SuccessAlert");
        }
        function getCookie(cname) {
                let name = cname + "=";
                let decodedCookie = decodeURIComponent(document.cookie);
                let ca = decodedCookie.split(';');
                for(let i = 0; i <ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                    }
                }
                return "";
                }

        function removeCookie(cname) {
            document.cookie = cname+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
        }
           
    </script>

    <script>
           
    </script>