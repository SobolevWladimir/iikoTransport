# iikoTransport
Библиотека для работы с  iikoTransport 


## Install 

## Get Started
```
$transport = new IikoTransport('api key'); 
```


## Organization 

### Returns organizations available to api-login user. 
```
$response = $transport->getOrganizationManager()->getList();
echo ($response->toArray()); 
```
