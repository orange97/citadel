using UnityEngine;
using System.Collections;

public class CameraFocusScatter : MonoBehaviour
{
	private DepthOfFieldScatter depthOfField;
	
	void Start(){
		depthOfField = GetComponent<DepthOfFieldScatter>();
	}
    void Update(){     
        if (Input.GetButtonDown ("Fire1")) { 
		    Ray ray= Camera.main.ScreenPointToRay (Input.mousePosition); 
            RaycastHit hit ; 
		    if(depthOfField){
		        if (Physics.Raycast(ray, out hit, Camera.main.farClipPlane)) { 
    	            depthOfField.focalTransform = hit.collider.transform; 
    	         } 
		    }
        } 
    }
}