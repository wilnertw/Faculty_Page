<title>Student Profile</title>
<section>
    <div class="container"><br><br><br><br><br><br>
        <h1 class="dashboard-category">Student Info: </h1><br><br><br><br>
        
        <div class="admin-container grid">
        <a href="<?=base_url()?>UpdateStudent" class="admin-button"><i class="fa-solid fa-user-graduate"></i> Update profile</a>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="dashboard-card">
            <div class="admin-container grid">
            <div class="links-card">
                <div class="links-icon"><a href="#" class="links-link"><i class="fa-solid fa-sitemap"></i></a></div>
                <h3 class="links-card-title">PMFKI Application</h3>
                <p class="links-card-description">Open for application!</p>
            </div>
            <div class="links-card">
                <div class="links-icon"><a href="#" class="links-link"><i class="fa-solid fa-message"></i></a></div>
                <h3 class="links-card-title">Feedback</h3>
                <p class="links-card-description">Give feedback</p>
            </div>
            <div class="links-card">
                <div class="links-icon"><a href="#" class="links-link"><i class="fa-solid fa-school-lock"></i></i></a></div>
                <h3 class="links-card-title">Reservation</h3>
                <p class="links-card-description">Reserve now!</p>
            </div>
            </div>
        </div>
        <br><br><br><br>
    </div>
</section>


<style>
section{
  background-color: #f2f2f2;
}
.dashboard-nav{
    display: table;
    justify-content: inline;
    padding: 0 1rem 0
}
.dashboard-card{
    background-color: white;
    border-radius: 10px;
    padding: 0 1rem 0;
    box-shadow: 0 1px 4px hsla(200, 4%, 15%, .1);
}
.admin-container{
  gap: 1rem;
  padding-bottom: 1rem;
  text-align: center;
}

.dashboard-category{
    padding-top: 1.5rem;
    text-align: center;
    color: black;
}

.admin-button{
  border: 1px solid #10182f; 
  border-radius: 10px;
  color:white;
  background-color: #10182f;
  display: inline-block;
  padding: .5rem 1.75rem;
  cursor: pointer;
  font-weight: var(--font-medium);
  transition: .3s;
}
.admin-button:hover{
  background-color: transparent;
  border-color: #10182f; 
  color: #10182f; 
}

@media only screen  and  (max-width: 320px){
    .admin-container{
        grid-template-columns: repeat(2, 1fr);
    }
}

@media only screen  and  (min-width: 576px){
  .admin-container{
    grid-template-columns: repeat(4, 1fr);
  }
}
</style>