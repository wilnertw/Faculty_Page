<section class="role">
    <div class="container">
    <br><br><br><br>
        <h1 style="text-align: center; padding-top: 3rem;">Please Choose Sign-Up Type</h1>
        <div class="role-container grid">
        <div class="role-card">
        <div class="links-icon"><a href="<?=base_url()?>studSignup" class="links-link"><i class="fa-solid fa-user-graduate"></i></a></div>
                <h3 class="links-card-title">Student</h3>
                <p class="links-card-description">Undergraduate/Postgraduate</p>
        </div>
        <div class="role-card"><!-- Change to Admin login Later -->
        <div class="links-icon"><a href="<?=base_url()?>adSignup" class="links-link"><i class="fa-solid fa-user-tie"></i></a></div>
                <h3 class="links-card-title">Admin</h3>
                <p class="links-card-description">Lecturers/Academic Staff</p>
        </div>
        </div>
    </div>
    </div>
</section>

<style>
.role-container{
  gap: 2rem;
  padding: 2rem 0 2rem;
  text-align: center;
}

.role-card{
    background-color: #f2f2f2;
    border-radius: 10px;
}

.role-card:hover{
    box-shadow: -2px 0 4px hsla(225, 49%, 12%, .2);
    -webkit-box-shadow: -2px 0 4px hsla(225, 49%, 12%, .2);
}
@media only screen  and  (min-width: 767px){
    .role-card{
    padding: 2.5rem 2rem 2rem;
  }
}

@media only screen  and  (max-width: 320px){
    .role-container{
        grid-template-columns: repeat(1, 2fr);
    }
}
  
@media only screen  and  (min-width: 992px){
    .role-container{
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>