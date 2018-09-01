var Question = function () {

    var settings = {
        API_KEY: "AIzaSyBEbRxE3O1Lj1uWd0mjN1Rv4VgchPhN5ng",
        TYPE: $(".type"),
        mcqPanel: $(".mcqPanel"),
        textQuestionPanel: $(".textQuestionPanel"),
        addQuestion: $("#addQuestion"),
        question: $(".question"),
        deleteQuestion: $(".deleteQuestion"),
        questioncontent: $(".question-content"),
        addMCQ: $(".addMCQ"),
        mcqContent:$(".mcq-content")


    };


    var profileSetup = function (val) {
        console.log(val)
        $.ajax({
            url: val.url,
            type: 'POST',
            data: val.data,
            dataType: 'JSON',
            success: function (data) {
                console.log(data)
                if (data.status) {
                    redirectURL = document.location.origin + '/profile/' + data.userId
                    window.location.replace(redirectURL)
                }

            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
        });


    }
    var addQuestionText = function () {
        var Question = '<div class="question-content"><div class="form-group"><div class="row"><div class="col-md-2">Type</div> <div class="col-md-2"><select name="question_type" class="form-control type"><option value="text">text</option><option value="mcq">MCQ</option></select></div></div></div> <div class="form-group "><div class="row"><div class="col-md-2">Question</div> <div class="col-md-8"><input placeholder="Enter Question title" name="title" type="text" class="form-control"></div> <a href="" class="deleteQuestion">Delete</a></div></div> <div class="textQuestionPanel"><div class="form-group"><div class="row"><div class="col-md-2">Answer</div> <div class="col-md-8"><input placeholder="Enter Answer " name="answer" type="text" class="form-control answer"></div></div></div> <hr></div> <div class="mcqPanel" style="display: none;"><div class="form-group"><div class="row"><div class="col-md-2">Choice 1</div> <div class="col-md-6"><input placeholder="Enter Choice " name="choice[]" type="text" class="form-control"></div> <div class="col-md-4"><label><input checked="checked" name="correct" type="radio" value="correct"> Correct</label> <a href="">Delete</a></div></div> <a class="addMCQ">Add MCQ</a></div> <hr></div></div>';
        settings.question.append(Question)
    }
    var addMCQText = function (elem) {
        var Question = '<div class="form-group"><div class="row"><div class="col-md-2">Choice 1</div> <div class="col-md-6"><input placeholder="Enter Choice " name="choice[]" type="text" class="form-control"></div> <div class="col-md-4"><label><input checked="checked" name="correct" type="radio" value="correct"> Correct</label> <a href="">Delete</a></div></div></div>';
        console.log(elem.parent())
        elem.parent().find('.mcq-content').append(Question)
    }



    var validateForm = function () {
        var errorFlag = false;
        // remove the error class first
        $('.inputerror').removeClass('inputerror');
        if (!settings.FIRSTNAME.val()) {

            settings.FIRSTNAME.addClass('inputerror');
            errorFlag = true;
        }
        return errorFlag;
    }

    return {

        init: function () {
            this.bindUI();
        },
        bindUI: function () {


            var self = this;

            $(document).on('change', '.type', function (e) {
                $(this).parent().parent().parent().parent().find('.textQuestionPanel').toggle('slow');
                $(this).parent().parent().parent().parent().find('.mcqPanel').toggle('slow');

            })

            settings.addQuestion.on('click', function (e) {
                e.preventDefault()
                addQuestionText()
            })
            $(".question").on('click','.addMCQ', function (e) {
                e.preventDefault()
                var elem=$(this)
                addMCQText(elem)
            })


            $(".question").on('click', '.deleteQuestion', function (e) {
                e.preventDefault()
                $(this).closest('.question-content').remove();

            })
        },

    };
}
var question = new Question();
question.init()