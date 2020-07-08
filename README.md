# iikoTransport
Библиотека для работы с  iikoTransport 


## Install 

## Get Started
```
$transport = new IikoTransport('api key'); 
```


## Organization 

### Returns organizations available to api-login user. 
.[link].('https://api-ru.iiko.services/#tag/Organizations')
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
$response = $transport->getTerminalGroupsManager()->getIsAlive($organization, $terminals);
echo ($response->toArray()); 
```

## Addresses 
Regions/cities/streets API. 

### Returns region details.
```
$response = $transport->getAddressesManager()->getRegionDetails($organizations);
echo ($response->toArray()); 
```

### Returns city details. 
```
$response = $transport->getAddressesManager()->getCityDetails($organizations);
echo ($response->toArray()); 
```
### Returns street details by city ID.. 
```
$response = $transport->getAddressesManager()->getStreetsByCity($organizationId, $city_id);
echo ($response->toArray()); 
```
