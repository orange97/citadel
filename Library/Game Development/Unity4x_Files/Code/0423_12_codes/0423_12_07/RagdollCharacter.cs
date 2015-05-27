using UnityEngine;
using System.Collections;

public class RagdollCharacter : MonoBehaviour
{
    private float hitTime;
    private bool wasHit = false;

    void Start()
    {
        DeactivateRagdoll();
    }

    void Update()
    {
        if (wasHit)
        {
            if (Time.time >= hitTime + 5.0f)
                DeactivateRagdoll();
        }
    }

    public void ActivateRagdoll()
    {
        this.GetComponent<AnimationStateMachine>().enabled = false;
        this.GetComponent<MixamoFPSBasicControlScript>().enabled = false;
        foreach (Rigidbody bone in GetComponentsInChildren<Rigidbody>())
        {
            bone.isKinematic = false;
            bone.detectCollisions = true;
        }
        foreach (Animation anim in GetComponentsInChildren<Animation>())
        {
            anim.GetComponent<Animation>().enabled = false;
        }
        wasHit = true;
        hitTime = Time.time;
    }

    public void DeactivateRagdoll()
    {
        this.GetComponent<AnimationStateMachine>().enabled = true;
        this.GetComponent<MixamoFPSBasicControlScript>().enabled = true;
        foreach (Rigidbody bone in GetComponentsInChildren<Rigidbody>())
        {
            bone.isKinematic = true;
            bone.detectCollisions = false;
        }
        foreach (Animation anim in GetComponentsInChildren<Animation>())
        {
            anim.GetComponent<Animation>().enabled = true;
        }
        transform.position = GameObject.Find("Spawnpoint").transform.position;
        transform.rotation = GameObject.Find("Spawnpoint").transform.rotation;
        wasHit = false;
    }
}