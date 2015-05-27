using UnityEngine;

public class CameraSwitch : MonoBehaviour {
    public GameObject[] cameras;
    public string[] shortcuts;
    public bool  changeAudioListener = true;
    void  Update (){  
  	    int i = 0;
	    for(i=0; i<cameras.Length; i++){  
		    if (Input.GetKeyUp(shortcuts[i]))
        	    SwitchCamera(i);
        }
    }

    void  SwitchCamera ( int index  ){
	   	int i = 0;
	    for(i=0; i<cameras.Length; i++){  
		    if(i != index){
			    if(changeAudioListener){
				    cameras[i].GetComponent<AudioListener>().enabled = false;
			    }
			    cameras[i].camera.enabled = false;
		    } else {
			    if(changeAudioListener){
				    cameras[i].GetComponent<AudioListener>().enabled = true;
			    }
			    cameras[i].camera.enabled = true;
		    }
	    }

    }
}