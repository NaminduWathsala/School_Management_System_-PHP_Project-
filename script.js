// Admin Signin

function adminsignIn() {

    var email = document.getElementById("e");
    var password = document.getElementById("p");
    var remember = document.getElementById("remember");

    var formData = new FormData();
    formData.append("email", email.value);
    formData.append("password", password.value);
    formData.append("remember", remember.checked);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;
            alert(t);
            if (t == "Success") {
                window.location = "adminDashbord.php";
            } else {
                document.getElementById("msg2").innerHTML = t;
            }

        }

    };

    r.open("POST", "adminSignInProcess.php", true);
    r.send(formData);
}

// Admin Signin



// Register Teacher

function registerTecher() {

    var fn = document.getElementById("fn");
    var ln = document.getElementById("ln");
    var fulln = document.getElementById("fulln");
    var nic = document.getElementById("nic");
    var email = document.getElementById("email");
    var dob = document.getElementById("dob");
    var doj = document.getElementById("doj");
    var mn = document.getElementById("mn");
    var ml = document.getElementById("ml");
    var gender = document.getElementById("gender");
    var quli = document.getElementById("quli");
    var grade = document.getElementById("grade");
    var sub = document.getElementById("sub");

    // alert(fn.value);
    // alert(ln.value);
    // alert(fulln.value);
    // alert(email.value);
    // alert(bod.value);
    // alert(doj.value);
    // alert(gender.value);
    // alert(quli.value);
    // alert(grade.value);
    // alert(sub.value);
    // alert(mn.value);
    // alert(ml.value);

    var form = new FormData();
    form.append("fn", fn.value);
    form.append("ln", ln.value);
    form.append("fulln", fulln.value);
    form.append("nic", nic.value);
    form.append("email", email.value);
    form.append("dob", dob.value);
    form.append("doj", doj.value);
    form.append("mn", mn.value);
    form.append("ml", ml.value);
    form.append("gender", gender.value);
    form.append("quli", quli.value);
    form.append("grade", grade.value);
    form.append("sub", sub.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            alert(text);
            if (text == "Success") {
                window.location = "registerTeacher.php";
            }
        }
    };

    r.open("POST", "registerTeacherProcess.php", true);
    r.send(form);

}
// Register Teacher




// Register Academic Officer

function registerAcademicOfficer() {

    var fn = document.getElementById("fn");
    var ln = document.getElementById("ln");
    var fulln = document.getElementById("fulln");
    var nic = document.getElementById("nic");
    var email = document.getElementById("email");
    var dob = document.getElementById("dob");
    var doj = document.getElementById("doj");
    var mn = document.getElementById("mn");
    var ml = document.getElementById("ml");
    var gender = document.getElementById("gender");
    var quli = document.getElementById("quli");


    // alert(fn.value);
    // alert(ln.value);
    // alert(fulln.value);
    // alert(email.value);
    // alert(dob.value);
    // alert(doj.value);
    // alert(mn.value);
    // alert(ml.value);
    // alert(gender.value);
    // alert(quli.value);
    // alert(grade.value);
    // alert(sub.value);


    var form = new FormData();
    form.append("fn", fn.value);
    form.append("ln", ln.value);
    form.append("fulln", fulln.value);
    form.append("nic", nic.value);
    form.append("email", email.value);
    form.append("dob", dob.value);
    form.append("doj", doj.value);
    form.append("mn", mn.value);
    form.append("ml", ml.value);
    form.append("gender", gender.value);
    form.append("quli", quli.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            alert(text);
            if (text == "Success") {
                window.location = "registerAcademicOfficer.php";
            }
        }
    };

    r.open("POST", "registerAcademicOfficerProcess.php", true);
    r.send(form);

}

// Register Academic Officer



// block Teacher 

function blockTeacher(email) {

    var mail = email;

    var blockbtn = document.getElementById("blockbtn" + mail);

    var f = new FormData();
    f.append("e", mail);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success1") {
                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Unblock";
            } else if (t == "success2") {
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block";
            }
        }
    };

    r.open("POST", "blockTeacherProcess.php", true);
    r.send(f);

}

// block Teacher 




// Search user Teacher

function searchTeacher() {
    var text = document.getElementById("searchtxt").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "manageTeachers.php";
            } else {
                alert(t);
                window.location = "manageTeachers.php";
            }
        }
    };

    r.open("GET", "searchTeacher.php?s=" + text, true);
    r.send();

}
// Search user Teacher






// block  Academic Officer 

function blockAcademicOfficer(email) {

    var mail = email;
    var blockbtn = document.getElementById("blockbtn" + mail);

    var f = new FormData();
    f.append("e", mail);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success1") {
                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Unblock";
            } else if (t == "success2") {
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block";
            }
        }
    };

    r.open("POST", "blockAcademicOfficerProcess.php", true);
    r.send(f);

}

// block  Academic Officer 




// Search user Academic Officer

function searchAcademicOfficer() {
    var text = document.getElementById("searchtxt").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "manageAcademicOfficer.php";
            } else {
                alert(t);
                window.location = "manageAcademicOfficer.php";
            }
        }
    };

    r.open("GET", "searchAcademicOfficer.php?s=" + text, true);
    r.send();

}

// Search user Academic Officer



// update Admin

function updateprofile() {
    var fn = document.getElementById("fn");
    var ln = document.getElementById("ln");
    var nic = document.getElementById("nic");
    var img = document.getElementById("profileimg");

    // alert(fn.value);
    // alert(ln.value);
    // alert(pass.value);
    // alert(email.value);
    // alert(img.value);
    // alert(img.files[0]);

    var form = new FormData();
    form.append("fn", fn.value);
    form.append("ln", ln.value);
    form.append("nic", nic.value);
    form.append("img", img.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);

            if (t == " || Image Saved Successfully.") {

                window.location = "adminProfileUpdate.php";
            }
            if (t == "User details Updated") {

                window.location = "adminProfileUpdate.php";
            }
        }
    };

    r.open("POST", "AdminProfileUpdateProcess.php", true);
    r.send(form);

}

// update Admin



function changeImg() {
    var image = document.getElementById("profileimg");
    var view = document.getElementById("prev");

    image.onchange = function() {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        view.src = url;
    }
}




// Teacher Signin
function teacherSignIn() {
    var email = document.getElementById("e");
    var password = document.getElementById("p");
    var remember = document.getElementById("remember");

    if (email.value == "") {
        alert("Please Enter the Email");
    } else if (password.value == "") {
        alert("Please Enter the Password");
    } else {

        var formData = new FormData();
        formData.append("email", email.value);
        formData.append("password", password.value);
        formData.append("remember", remember.checked);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function() {

            if (r.readyState == 4) {

                var t = r.responseText;
                if (t == "Success") {

                    window.location = "teacherDashbord.php";
                } else if (t == "VCCode") {
                    var verificationmodel = document.getElementById("verificationmodel");
                    v = new bootstrap.Modal(verificationmodel);
                    v.show();

                } else {
                    // document.getElementById("msg2").innerHTML = t;
                    alert(t);
                }

            }

        };

        r.open("POST", "teacherSignInProcess.php", true);
        r.send(formData);
    }
}
// Teacher Signin





// Teacher Signin Verification
function teacherSignInWithVerification() {

    var email = document.getElementById("e");
    var password = document.getElementById("p");
    var remember = document.getElementById("remember");
    var verificationcode = document.getElementById("v");

    var formData = new FormData();
    formData.append("email", email.value);
    formData.append("password", password.value);
    formData.append("remember", remember.checked);
    formData.append("vc", verificationcode.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;
            alert(t);
            if (t == "Success") {
                window.location = "TeacherDashbord.php";
            } else {
                alert(t);
            }

        }

    };

    r.open("POST", "teacherSignInVerificationProcess.php", true);
    r.send(formData);
}

// Teacher SigninVerification


//////////Academic Officer////////



// Academic Officer Signin 
function academicOfficerSignIn() {
    var email = document.getElementById("e");
    var password = document.getElementById("p");
    var remember = document.getElementById("remember");

    if (email.value == "") {
        alert("Please Enter the Email");
    } else if (password.value == "") {
        alert("Please Enter the Password");
    } else {

        var formData = new FormData();
        formData.append("email", email.value);
        formData.append("password", password.value);
        formData.append("remember", remember.checked);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function() {

            if (r.readyState == 4) {

                var t = r.responseText;
                if (t == "Success") {
                    alert(t);
                    window.location = "academicOfficerDashbord.php";
                } else if (t == "VCCode") {
                    var verificationmodel = document.getElementById("verificationmodel");
                    v = new bootstrap.Modal(verificationmodel);
                    v.show();

                } else {
                    // document.getElementById("msg2").innerHTML = t;
                    alert(t);
                }

            }

        };

        r.open("POST", "academicOfficerSignInProcess.php", true);
        r.send(formData);
    }
}
// Academic Officer Signin





//  Academic Officer Signin Verification
function academicOfficerSignInWithVerification() {

    var email = document.getElementById("e");
    var password = document.getElementById("p");
    var remember = document.getElementById("remember");
    var verificationcode = document.getElementById("v");

    var formData = new FormData();
    formData.append("email", email.value);
    formData.append("password", password.value);
    formData.append("remember", remember.checked);
    formData.append("vc", verificationcode.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;
            alert(t);
            if (t == "Success") {
                window.location = "academicOfficerDashbord.php";
            } else {
                alert(t);
            }

        }

    };

    r.open("POST", "academicOfficerSignInVerificationProcess.php", true);
    r.send(formData);
}

// Academic Officer Signin Verification



// teacherProfileUpdateProcess.php
function updateTeacherprofile() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var fullname = document.getElementById("fullname");
    var phone = document.getElementById("phone");
    var mobile = document.getElementById("mobile");
    var nic = document.getElementById("nic");
    var dob = document.getElementById("dob");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var city = document.getElementById("city");
    var province = document.getElementById("province");
    var quli = document.getElementById("quli");
    var img = document.getElementById("profileimg");

    // alert(fname.value);
    // alert(lname.value);
    // alert(fullname.value);
    // alert(phone.value);
    // alert(mobile.value);
    // alert(dob.value);
    // alert(line1.value);
    // alert(line2.value);
    // alert(city.value);
    // alert(province.value);
    // alert(quli.value);

    var form = new FormData();
    form.append("f", fname.value);
    form.append("l", lname.value);
    form.append("fn", fullname.value);
    form.append("p", phone.value);
    form.append("m", mobile.value);
    form.append("dob", dob.value);
    form.append("nic", nic.value);
    form.append("a1", line1.value);
    form.append("a2", line2.value);
    form.append("c", city.value);
    form.append("pro", province.value);
    form.append("quli", quli.value);
    form.append("i", img.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
            if (t == " || Address Successfuly updated") {

                window.location = "teacherProfileUpdate.php";
            }
            if (t == " || New Address Added") {

                window.location = "teacherProfileUpdate.php";
            }
            if (t == " || Image Saved Successfully.") {

                window.location = "teacherProfileUpdate.php";
            }
            if (t == "User details Updated") {

                window.location = "teacherProfileUpdate.php";
            }
        }
    };

    r.open("POST", "teacherProfileUpdateProcess.php", true);
    r.send(form);
}
// teacherProfileUpdateProcess



// Academic Officer ProfileUpdateProcess
function updateAcademicOfficerprofile() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var fullname = document.getElementById("fullname");
    var phone = document.getElementById("phone");
    var mobile = document.getElementById("mobile");
    var nic = document.getElementById("nic");
    var dob = document.getElementById("dob");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var city = document.getElementById("city");
    var province = document.getElementById("province");
    var quli = document.getElementById("quli");
    var img = document.getElementById("profileimg");

    // alert(fname.value);
    // alert(lname.value);
    // alert(fullname.value);
    // alert(phone.value);
    // alert(mobile.value);
    // alert(dob.value);
    // alert(line1.value);
    // alert(line2.value);
    // alert(city.value);
    // alert(province.value);
    // alert(quli.value);

    var form = new FormData();
    form.append("f", fname.value);
    form.append("l", lname.value);
    form.append("fn", fullname.value);
    form.append("p", phone.value);
    form.append("m", mobile.value);
    form.append("dob", dob.value);
    form.append("nic", nic.value);
    form.append("a1", line1.value);
    form.append("a2", line2.value);
    form.append("c", city.value);
    form.append("pro", province.value);
    form.append("quli", quli.value);
    form.append("i", img.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
            if (t == " || Address Successfuly updated") {

                window.location = "academicOfficerProfileUpdate.php";
            }
            if (t == " || New Address Added") {

                window.location = "academicOfficerProfileUpdate.php";
            }
            if (t == " || Image Saved Successfully.") {

                window.location = "academicOfficerProfileUpdate.php";
            }
            if (t == "User details Updated") {

                window.location = "academicOfficerProfileUpdate.php";
            }
        }
    };

    r.open("POST", "academicOfficerProfileUpdateProcess.php", true);
    r.send(form);
}

// academicOfficerProfileUpdateProcess.php





// Register Teacher

function registerStudent() {

    var fn = document.getElementById("fn");
    var ln = document.getElementById("ln");
    var fulln = document.getElementById("fulln");
    var email = document.getElementById("email");
    var dob = document.getElementById("dob");
    var doj = document.getElementById("doj");
    var gender = document.getElementById("gender");
    var mn = document.getElementById("mn");
    var ml = document.getElementById("ml");
    var grade = document.getElementById("grade");

    // alert(fn.value);
    // alert(ln.value);
    // alert(fulln.value);
    // alert(nic.value);
    // alert(email.value);
    // alert(dob.value);
    // alert(doj.value);
    // alert(gender.value);
    // alert(mn.value);
    // alert(ml.value);
    // alert(grade.value);

    var form = new FormData();
    form.append("fn", fn.value);
    form.append("ln", ln.value);
    form.append("fulln", fulln.value);
    form.append("email", email.value);
    form.append("dob", dob.value);
    form.append("doj", doj.value);
    form.append("mn", mn.value);
    form.append("ml", ml.value);
    form.append("gender", gender.value);
    form.append("grade", grade.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            alert(text);
            if (text == "Success") {
                window.location = "registerStudent.php";
            }
        }
    };

    r.open("POST", "registerStudentProcess.php", true);
    r.send(form);

}
// Register Teacher






// Students Signin
function studentSignIn() {
    var email = document.getElementById("e");
    var password = document.getElementById("p");
    var remember = document.getElementById("remember");

    if (email.value == "") {
        alert("Please Enter the Email");
    } else if (password.value == "") {
        alert("Please Enter the Password");
    } else {

        var formData = new FormData();
        formData.append("email", email.value);
        formData.append("password", password.value);
        formData.append("remember", remember.checked);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function() {

            if (r.readyState == 4) {

                var t = r.responseText;
                if (t == "Success") {

                    window.location = "studentDashbord.php";
                } else if (t == "VCCode") {
                    var verificationmodel = document.getElementById("verificationmodel");
                    v = new bootstrap.Modal(verificationmodel);
                    v.show();

                } else {
                    // document.getElementById("msg2").innerHTML = t;
                    alert(t);
                }

            }

        };

        r.open("POST", "studentSignInProcess.php", true);
        r.send(formData);
    }
}
// Students Signin





// Students Signin Verification
function studentSignInWithVerification() {

    var email = document.getElementById("e");
    var password = document.getElementById("p");
    var remember = document.getElementById("remember");
    var verificationcode = document.getElementById("v");

    var formData = new FormData();
    formData.append("email", email.value);
    formData.append("password", password.value);
    formData.append("remember", remember.checked);
    formData.append("vc", verificationcode.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;
            alert(t);
            if (t == "Success") {
                window.location = "studentDashbord.php";
            } else {
                alert(t);
            }

        }

    };

    r.open("POST", "studentSignInVerificationProcess.php", true);
    r.send(formData);
}

// Students SigninVerification






// studentProfileUpdateProcess.php
function updateStudentprofile() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var fullname = document.getElementById("fullname");
    var phone = document.getElementById("phone");
    var mobile = document.getElementById("mobile");
    var dob = document.getElementById("dob");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var city = document.getElementById("city");
    var province = document.getElementById("province");

    var pfn = document.getElementById("pfn");
    var pln = document.getElementById("pln");
    var pemail = document.getElementById("pemail");
    var pbirth = document.getElementById("pbod");
    var pmn = document.getElementById("pmn");
    var pml = document.getElementById("pml");
    var pgen = document.getElementById("pgen");

    var img = document.getElementById("profileimg");

    // alert(pbirth.value);
    // alert(lname.value);
    // alert(fullname.value);
    // alert(phone.value);
    // alert(mobile.value);
    // alert(dob.value);
    // alert(line1.value);
    // alert(line2.value);
    // alert(city.value);
    // alert(province.value);
    // alert(pfn.value);
    // alert(pln.value);
    // alert(pemail.value);
    // alert(pbod.value);
    // alert(pmn.value);
    // alert(pml.value);
    // alert(pgen.value);

    var form = new FormData();
    form.append("f", fname.value);
    form.append("l", lname.value);
    form.append("fn", fullname.value);
    form.append("p", phone.value);
    form.append("m", mobile.value);
    form.append("dob", dob.value);
    form.append("c", city.value);
    form.append("a1", line1.value);
    form.append("a2", line2.value);
    form.append("pro", province.value);

    form.append("pfn", pfn.value);
    form.append("pln", pln.value);
    form.append("pemail", pemail.value);
    form.append("pbod", pbirth.value);
    form.append("pmn", pmn.value);
    form.append("pml", pml.value);
    form.append("pgen", pgen.value);

    form.append("i", img.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
            if (t == " || Address Successfuly updated") {

                window.location = "studentProfileUpdate.php";
            }
            if (t == " || New Address Added") {

                window.location = "studentProfileUpdate.php";
            }
            if (t == "Student Parent Details Updated || ") {

                window.location = "studentProfileUpdate.php";
            }
            if (t == "Student Parent Details Added || ") {

                window.location = "studentProfileUpdate.php";
            }
            if (t == " || Image Saved Successfully.") {

                window.location = "studentProfileUpdate.php";
            }
            if (t = "User details Updated") {

                window.location = "studentProfileUpdate.php";
            }
        }
    };

    r.open("POST", "studentProfileUpdateProcess.php", true);
    r.send(form);
}
// studentProfileUpdateProcess




// block Teacher 

function blockStudent(email) {

    var mail = email;

    var blockbtn = document.getElementById("blockbtn" + mail);

    var f = new FormData();
    f.append("e", mail);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success1") {
                blockbtn.className = "btn btn-success";
                blockbtn.innerHTML = "Unblock";
            } else if (t == "success2") {
                blockbtn.className = "btn btn-danger";
                blockbtn.innerHTML = "Block";
            }
        }
    };

    r.open("POST", "blockStudentProcess.php", true);
    r.send(f);

}

// block Teacher





// Note Upload
function noteUpload() {
    var note = document.getElementById("lnn");
    var myfile = document.getElementById("myfile");

    // alert(note.value);
    // alert(myfile.value);

    var form = new FormData();
    form.append("n", note.value);
    form.append("f", myfile.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
            if (t == "File uploaded successfully") {

                window.location = "addNotes.php";
            }

        }
    };

    r.open("POST", "addNoteProcess.php", true);
    r.send(form);
}
// Note Upload




// assingmentUpload
function assingmentUpload() {
    var name = document.getElementById("aen");
    var start = document.getElementById("rd");
    var end = document.getElementById("ed");
    var type = document.getElementById("aet");
    var myfile = document.getElementById("myfile");

    // alert(name.value);
    // alert(start.value);
    // alert(end.value);
    // alert(type.value);
    // alert(myfile.value);

    var form = new FormData();
    form.append("n", name.value);
    form.append("s", start.value);
    form.append("e", end.value);
    form.append("t", type.value);
    form.append("f", myfile.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
            if (t == "File uploaded successfully") {

                window.location = "addAssingments.php";
            }

        }
    };

    r.open("POST", "addAssingmentsProcess.php", true);
    r.send(form);
}
// assingmentUpload



var examid;

// Student Exam Model
function studentExamModel(eid) {

    examid = eid;
    var studentExamModel = document.getElementById("studentExamModel");
    v = new bootstrap.Modal(studentExamModel);
    v.show();
}
// Student Exam Model





// Student Exam Upload
function studentExamUpload() {

    var myfile = document.getElementById("myfile");

    var f = new FormData();
    f.append("eid", examid);
    f.append("f", myfile.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
            if (t == "File uploaded successfully") {
                window.location = "studentExam.php";
            }
        }
    };

    r.open("POST", "studentExamProcess.php", true);
    r.send(f);

}
// Student Exam Upload






// Student Exam Upload
function addAnswers(aid) {
    var marks = document.getElementById("mark" + aid);
    var f = new FormData();
    f.append("a", aid);
    f.append("m", marks.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
            if (t == "mark added Succesfully") {
                window.location = "addAnswers.php";
            }
            if (t == "mark updated Succesfully") {
                window.location = "addAnswers.php";
            }
        }
    };

    r.open("POST", "addAnswersProcess.php", true);
    r.send(f);

}
// Student Exam Upload






function uploadMarks(id) {

    var eid = id;


    var ubtn = document.getElementById("blockbtn" + id);

    var f = new FormData();
    f.append("e", eid);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success1") {
                ubtn.className = "btn btn-warning";
                ubtn.innerHTML = "Upload";
            } else if (t == "success2") {
                ubtn.className = "btn btn-success";
                ubtn.innerHTML = "Done";
            }
        }
    };

    r.open("POST", "uploadMarksProcess.php", true);
    r.send(f);

}