function ApiTester() {
    return {
        httpMethod: '',
        url: '',
        dataType: '',
        bodyData: '',
        showParameterField: false,
        showFormTypes: false,
        showDataTypes: false,
        showResponse: false,
        queryParameter: [],
        formTypes: '',
        initApiTester() {
            //this.queryParameter.push({ id: 'param-1', key : '', value : ''});
            //console.log(this.queryParameter)

            this.httpMethod = 'GET';
            this.url = 'http://localhost:8080/cars';
            this.formTypes = 'none'

        },
        addParameter() {
            if (this.queryParameter.length == 0) {
                this.queryParameter.push({ id: 'param1', key: '', keyName: 'param1-key', value: '', valueName: 'param1-value' });
            } else {
                let newId = this.queryParameter.length + 1;
                newId = 'param' + newId;
                this.queryParameter.push({ id: newId, key: '', keyName: newId + '-key', value: '', valueName: newId + '-value' });
            }
        },
        deleteParameter(index) {
            console.log(index);
            this.queryParameter.splice(index, 1);

        },
        toggleRawDataField(el) {
            console.log(this.httpMethod);
            if (el.value === "GET") {
                this.showFormTypes = false;
            } else {
                this.showFormTypes = true;
            }
        },
        /*toggleResponseCode() {
            let codeEl = document.getElementById("response-code");
            if (codeEl.innerHTML == "") {
                this.showResponse = false;
                return false;
            } else {
                this.showResponse = true;
                return true;
            }
        },*/
        async executeRequest() {
            const httpMethods = ["GET", "POST", "PUT", "PATCH", "DELETE"];
            const mimeTypes = { "text": "text/plain", "json": "application/json", "xml": "application/xml" };

            let headers = {}, body = null;
            let form = document.getElementById("request-form");
            let url = document.getElementById("url").value;
            // let httpMethod = document.getElementById("http-method").value;
            let dataType = document.getElementById("data-type").value;
            let responseCode = document.getElementById("response-code");
            let responseObjectCode = document.getElementById("response-object-code");

            responseCode.innerHTML = "";
            responseObjectCode.innerHTML = "";

            let data = new FormData(form);

            let fetchOptions = {};

            if (!url) {
                try {
                    new URL(url);
                    return true;
                } catch (err) {
                    alert("URL is invalid!");
                    return false;
                }
            }

            if (!httpMethods.includes(this.httpMethod)) {
                alert("HTTP Method must be GET, PUT, POST, PATCH or DELETE!");
                return false;
            }

            if (this.httpMethod != "GET") {
                if (!mimeTypes.hasOwnProperty(dataType)) {
                    alert("Body data type must be JSON, TEXT or XML!");
                    return false;
                }
                headers = {
                    "Content-Type": mimeTypes[dataType],
                };
                //body = JSON.stringify(data);
                fetchOptions["headers"] = headers;
                fetchOptions["body"] = data.get("body-data");
            }

            fetchOptions["method"] = this.httpMethod;


            if (this.queryParameter.length > 0) {

            }

            try {
                const response = await fetch(url, fetchOptions);
                const result = await response.json();
                if (response.ok) {
                    
                    console.log("Success:", result);
                    responseCode.innerHTML = JSON.stringify(result, null, 4);
                    responseObjectCode.innerHTML = response.status + " - " + response.statusText + " - " + response.url;
                    
                } else {
                    console.log(response);
                    responseCode.innerHTML = JSON.stringify(result, null, 4);
                    responseObjectCode.innerHTML = response.status + " - " + response.statusText + " - " + response.url;

                }
                this.showResponse = true;

            } catch (error) {
                console.error("Error:", error);
                responseCode.innerHTML = error;
                responseObjectCode.innerHTML = error;
            }

        }
    }
}
