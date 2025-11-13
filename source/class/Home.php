<?php 

  class Home{
    private $cn;
    public $tables = array(

      
      array(
        "Name"=>"PostComment",
        "class"=>"PostComment",
        "url"=>"post_comments",
        "name"=>"post_comment",
        "getNbrFunction"=>"getNbrPostComment",
        "getNbrDeletedFunction"=>"getNbrDeletedPostComment",
        "has_fk"=>1,
      ),
      array(
        "Name"=>"PostCategoryTranslation",
        "class"=>"PostCategoryTranslation",
        "url"=>"post_category_translations",
        "name"=>"post_category_translation",
        "getNbrFunction"=>"getNbrPostCategoryTranslation",
        "getNbrDeletedFunction"=>"getNbrDeletedPostCategoryTranslation",
        "has_fk"=>1,
      ),
      array(
        "Name"=>"PostCategory",
        "class"=>"PostCategory",
        "url"=>"post_categorys",
        "name"=>"post_category",
        "getNbrFunction"=>"getNbrPostCategory",
        "getNbrDeletedFunction"=>"getNbrDeletedPostCategory",
        "has_fk"=>1,
      ),
      array(
        "Name"=>"PostTranslation",
        "class"=>"PostTranslation",
        "url"=>"post_translations",
        "name"=>"post_translation",
        "getNbrFunction"=>"getNbrPostTranslation",
        "getNbrDeletedFunction"=>"getNbrDeletedPostTranslation",
        "has_fk"=>1,
      ),
      array(
        "Name"=>"Payments",
        "class"=>"Payments",
        "url"=>"paymentss",
        "name"=>"payments",
        "getNbrFunction"=>"getNbrPayments",
        "getNbrDeletedFunction"=>"getNbrDeletedPayments",
        "has_fk"=>1,
      ),
      array(
        "Name"=>"Bookings",
        "class"=>"Bookings",
        "url"=>"bookingss",
        "name"=>"bookings",
        "getNbrFunction"=>"getNbrBookings",
        "getNbrDeletedFunction"=>"getNbrDeletedBookings",
        "has_fk"=>1,
      ),
      array(
        "Name"=>"ProgramDayTranslation",
        "class"=>"ProgramDayTranslation",
        "url"=>"program_day_translations",
        "name"=>"program_day_translation",
        "getNbrFunction"=>"getNbrProgramDayTranslation",
        "getNbrDeletedFunction"=>"getNbrDeletedProgramDayTranslation",
        "has_fk"=>1,
      ),
      array(
        "Name"=>"ProgramTranslation",
        "class"=>"ProgramTranslation",
        "url"=>"program_translations",
        "name"=>"program_translation",
        "getNbrFunction"=>"getNbrProgramTranslation",
        "getNbrDeletedFunction"=>"getNbrDeletedProgramTranslation",
        "has_fk"=>1,
      ),
      array(
        "Name"=>"CategoryTranslation",
        "class"=>"CategoryTranslation",
        "url"=>"category_translations",
        "name"=>"category_translation",
        "getNbrFunction"=>"getNbrCategoryTranslation",
        "getNbrDeletedFunction"=>"getNbrDeletedCategoryTranslation",
        "has_fk"=>1,
      ),
      array(
        "Name"=>"Image",
        "class"=>"Image",
        "url"=>"images",
        "name"=>"image",
        "getNbrFunction"=>"getNbrImage",
        "getNbrDeletedFunction"=>"getNbrDeletedImage",
        "has_fk"=>0,
      ),
      array(
        "Name"=>"Post",
        "class"=>"Post",
        "url"=>"posts",
        "name"=>"post",
        "getNbrFunction"=>"getNbrPost",
        "getNbrDeletedFunction"=>"getNbrDeletedPost",
        "has_fk"=>1,
      ),
      array(
        "Name"=>"Client",
        "class"=>"Client",
        "url"=>"clients",
        "name"=>"client",
        "getNbrFunction"=>"getNbrClient",
        "getNbrDeletedFunction"=>"getNbrDeletedClient",
        "has_fk"=>0,
      ),
      array(
        "Name"=>"ProgramDay",
        "class"=>"ProgramDay",
        "url"=>"program_days",
        "name"=>"program_day",
        "getNbrFunction"=>"getNbrProgramDay",
        "getNbrDeletedFunction"=>"getNbrDeletedProgramDay",
        "has_fk"=>1,
      ),
      array(
        "Name"=>"Category",
        "class"=>"Category",
        "url"=>"categorys",
        "name"=>"category",
        "getNbrFunction"=>"getNbrCategory",
        "getNbrDeletedFunction"=>"getNbrDeletedCategory",
        "has_fk"=>1,
      ),
      array(
        "Name"=>"Program",
        "class"=>"Program",
        "url"=>"programs",
        "name"=>"program",
        "getNbrFunction"=>"getNbrProgram",
        "getNbrDeletedFunction"=>"getNbrDeletedProgram",
        "has_fk"=>1,
      ),
      array(
        "Name"=>"User",
        "class"=>"cg_user",
        "url"=>"users",
        "name"=>"cg_user",
        "getNbrFunction"=>"getNbrUser",
        "getNbrDeletedFunction"=>"getNbrDeletedUser",
        "has_fk"=>false,
      ),
    );

    public function __construct(){
      $this->cn = new GestionConnexion();
      foreach ($this->tables as $keytable => $table) {
        $getNbrFunction = $table["getNbrFunction"];
        $getNbrDeletedFunction = $table["getNbrDeletedFunction"];
        
        $t = new $table["class"]();
        $t->$getNbrFunction();
        $this->tables[$keytable]["counter"] = $t->counter;
        $t->$getNbrDeletedFunction();
        $this->tables[$keytable]["trash_counter"] = $t->trash_counter;
      }
    }
  }

?>