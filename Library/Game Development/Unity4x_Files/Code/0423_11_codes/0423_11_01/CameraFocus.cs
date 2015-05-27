using UnityEngine;
using System.Collections;

public class CameraFocus : MonoBehaviour
{
	private DepthOfField34 depthOfField;
	
	void Start(){
		depthOfField = GetComponent<DepthOfField34>();
	}
    void Update(){     
        if (Input.GetButtonDown ("Fire1")) { 
		    Ray ray= Camera.main.ScreenPointToRay (Input.mousePosition); 
            RaycastHit hit ; 
		    if(depthOfField){
		        if (Physics.Raycast(ray, out hit, Camera.main.farClipPlane)) { 
    	            depthOfField.objectFocus = hit.collider.transform; 
    	        } 
		    }
        } 
    }
}