<div class="contacts text-center col-md-12 col-sm-12">
    <div class="text-center" >
        <p class="headingText">Contact</p>
    </div>
    <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 contact">
        <form class="form-horizontal">
            <div class="form-group">
                <div class="col-md-4 col-sm-2">
                    <label>Subject:</label>
                </div>
                <div class="col-md-8 col-sm-10">
                    <input name="subject" type="text" class="form-control" placeholder="Subject" ng-model="newMessage.subject"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4 col-sm-2">
                    <label>Email:</label>
                </div>
                <div class="col-md-8 col-sm-10">
                    <input name="email" type="text" class="form-control" placeholder="Email" ng-model="newMessage.email"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4 col-sm-2">
                    <label>Message:</label>
                </div>
                <div class="col-md-8 col-sm-10">
                    <textarea name="message" class="form-control" placeholder="Subject"  ng-model="newMessage.message"></textarea>
                </div>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-info" type="button" ng-click="addMessage(newMessage)">Send</button>
            </div>
        </form>
        <div class="well" ng-show="addMessage">
            <p style="font-size: 20px;" class="bg-success">{{addMessage}}</p>
        </div>
    </div>
</div>
<