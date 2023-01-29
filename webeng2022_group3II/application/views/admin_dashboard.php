<title>Admin Dashboard</title>
<section>
    <div class="container"><br><br><br><br><br><br>
        <h1 class="dashboard-category">Admin Dashboard</h1><br><br><br><br>
        <div class="admin-container grid">
        <a href="<?=base_url()?>UpdateAdmin" class="admin-button"><i class="fa-solid fa-user-tie"></i> Update profile</a>
        <a href="#" class="admin-button"><i class="fa-solid fa-user-graduate"></i> Student details</a>
        </div>
    </div>
</section>
<section>
    <div class="container">

        <div class="dashboard-card">
            <h2 class="dashboard-category">Informations</h2>
            <div class="admin-container grid">
            <div class="links-card">
                <div class="links-icon"><a href="#" class="links-link"><i class="fa-solid fa-graduation-cap"></i></a></div>
                <h3 class="links-card-title">Programme</h3>
                <p class="links-card-description">Programme Details</p>
            </div>
            <div class="links-card">
                <div class="links-icon"><a href="#" class="links-link"><i class="fa-solid fa-calendar-days"></i></a></div>
                <h3 class="links-card-title">Academic Calender</h3>
                <p class="links-card-description">Academic Calender Details</p>
            </div>
            <div class="links-card">
                <div class="links-icon"><a href="#" class="links-link"><i class="fa-solid fa-building-user"></i></a></div>
                <h3 class="links-card-title">Corporate Information</h3>
                <p class="links-card-description">Corporate Information Details</p>
            </div>
            </div>
        </div>
        <br><br>

        <div class="dashboard-card">
            <h2 class="dashboard-category">Application</h2>
            <div class="admin-container grid">
            <div class="links-card">
                <div class="links-icon"><a href="#" class="links-link"><i class="fa-solid fa-sitemap"></i></a></div>
                <h3 class="links-card-title">PMFKI Application</h3>
                <p class="links-card-description">List of Applicant</p>
            </div>
            <div class="links-card">
                <div class="links-icon"><a href="#" class="links-link"><i class="fa-solid fa-clipboard-user"></i></a></div>
                <h3 class="links-card-title">Academic Staff Application</h3>
                <p class="links-card-description">List of Applicant</p>
            </div>
            <div class="links-card">
                <div class="links-icon"><a href="<?=base_url()?>RA_con_Admin" class="links-link"><i class="fa-solid fa-magnifying-glass"></i></a></div>
                <h3 class="links-card-title">Research</h3>
                <p class="links-card-description">Researcher Application List</p>
            </div>
            </div>
        </div>
        <br><br>

        <div class="dashboard-card">
            <h2 class="dashboard-category">Students' Feedbacks and Inquires</h2>
            <div class="admin-container grid">
            <div class="links-card">
                <div class="links-icon"><a href="#" class="links-link"><i class="fa-solid fa-message"></i></a></div>
                <h3 class="links-card-title">Student feedback</h3>
                <p class="links-card-description">List of Student feedback</p>
            </div>
            <div class="links-card">
                <div class="links-icon"><a href="#" class="links-link"><i class="fa-solid fa-circle-question"></i></a></div>
                <h3 class="links-card-title">Inquiry</h3>
                <p class="links-card-description">List of Inquiry</p>
            </div>
            </div>
        </div>
        <br><br>


        <div class="dashboard-card">
            <h2 class="dashboard-category">Subscription</h2>
            <div class="admin-container grid">
            <div class="links-card">
                <div class="links-icon"><a href="#" class="links-link"><i class="fa-solid fa-newspaper"></i></a></div>
                <h3 class="links-card-title">Newsletter Subscription</h3>
                <p class="links-card-description">List of Subscriptor</p>
            </div>
            </div>
        </div>
        <br><br>

        <div class="dashboard-card">
            <h2 class="dashboard-category">Reservation</h2>
            <div class="admin-container grid">
            <div class="links-card">
                <div class="links-icon"><a href="#" class="links-link"><i class="fa-solid fa-school-lock"></i></i></a></div>
                <h3 class="links-card-title">Reservation</h3>
                <p class="links-card-description">List of Reservation</p>
            </div>
            </div>
        </div>
        <br><br>
        <br><br>

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