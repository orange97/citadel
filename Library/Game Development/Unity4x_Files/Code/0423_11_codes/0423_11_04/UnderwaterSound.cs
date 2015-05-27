using UnityEngine;
using System.Collections;

public class UnderwaterSound : MonoBehaviour
{
    public GameObject oceanObject;
    public float falloff = 1.0f;
	private AudioLowPassFilter filter;
    void Start(){
		filter =  GetComponent<AudioLowPassFilter>();
	    filter.enabled = false;	
    }
    void Update()
    {
        if (transform.position.y < oceanObject.transform.position.y){
            filter.enabled = true;
            filter.cutoffFrequency = 1000 - (transform.position.y * falloff);
        }else{
            filter.enabled = false;
        }
    }
}