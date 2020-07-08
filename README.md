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

## Terminal groups
### Method that returns information on groups of delivery terminals.
```
$response = $transport->getTerminalGroupsManager()->getInfo($organization);
echo ($response->toArray()); 
```
### Method that returns information on availability of group of terminals.
```
$response = $transport->getTerminalGroupsManager()->getIsAlive($organization);
echo ($response->toArray()); 
```
