using UnityEngine;
using System.Collections;

public class TriggerSoundtrack : MonoBehaviour{
    public bool waitForSequence = true;
    public bool keepTimeAndVolume = false;
    public float trackVolume = 1.0f;
    public float fadeIn = 0.0f;
    public float fadeOutPrevious = 0.0f;
    public int clip;
    private DynamicSoundtrack soundtrack;

    void Awake(){
        soundtrack = Camera.main.GetComponent<DynamicSoundtrack>();
    }
    void OnTriggerEnter(Collider other){
        if (other.gameObject.CompareTag("Player"))
            soundtrack.ChangeSoundtrack(clip, waitForSequence, keepTimeAndVolume, trackVolume, fadeIn, fadeOutPrevious);
    }
}